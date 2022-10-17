<?php

namespace App\Services;

use App\Interfaces\BookRepositoryInterface;
use App\Interfaces\BookItemRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;

class BookService
{
    protected BookRepositoryInterface $bookRepository;
    protected BookItemRepositoryInterface $bookItemRepository;

    public function __construct(
        BookRepositoryInterface $bookRepository,
        BookItemRepositoryInterface $bookItemRepository
    ) {
        $this->bookRepository = $bookRepository;
        $this->bookItemRepository = $bookItemRepository;
    }

    public function store($request): array
    {
        $result = $this->bookRepository->store($request)->toArray();

        return ['book' => $result, 'status' => Response::HTTP_OK];
    }

    public function find($id): array
    {
        $result = $this->bookRepository->find($id)->toArray();

        return ['book' => $result, 'status' => Response::HTTP_OK];
    }

    public function update($request, $id): array
    {
        $result = $this->bookRepository->update($request, $id);

        return ['updated' => $result, 'status' => Response::HTTP_OK];
    }

    public function delete($id): array
    {
        if ($this->bookItemRepository->find($id)->borrowed) {
            return ['error' => 'The book is currently in use', 'status' => Response::HTTP_UNPROCESSABLE_ENTITY];
        }

        $result = $this->bookRepository->delete($id);
        return ['deleted' => $result, 'status' => Response::HTTP_OK];
    }
}
