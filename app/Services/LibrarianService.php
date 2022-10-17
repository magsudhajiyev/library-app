<?php

namespace App\Services;

use App\Interfaces\LibrarianRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;

class LibrarianService
{
    protected LibrarianRepositoryInterface $librarianRepository;

    public function __construct(LibrarianRepositoryInterface $librarianRepository)
    {
        $this->librarianRepository = $librarianRepository;
    }

    public function monthlyReport(): array
    {
        $librarian = $this->librarianRepository->instance(); 

        foreach ($this->librarianRepository->withCount('issuedBooks')->monthlyReport() as $_librarian) {
            if($_librarian->issued_books_count > $librarian->issued_books_count) {
                $librarian = $_librarian;
            }
        }

        return ['librarian' => $librarian, 'status' => Response::HTTP_OK];
    }
}
