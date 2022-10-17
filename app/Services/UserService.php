<?php

namespace App\Services;

use App\Interfaces\BookItemRepositoryInterface;
use App\Interfaces\LibrarianRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Http\Requests\BorrowRequest;
use Symfony\Component\HttpFoundation\Response;

class UserService
{
    protected UserRepositoryInterface $userRepository;
    protected LibrarianRepositoryInterface $librarianRepository;
    protected BookItemRepositoryInterface $bookItemRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
        LibrarianRepositoryInterface $librarianRepository,
        BookItemRepositoryInterface $bookItemRepository
    )
    {
        $this->userRepository = $userRepository;
        $this->librarianRepository = $librarianRepository;
        $this->bookItemRepository = $bookItemRepository;
    }

    public function borrowBook(BorrowRequest $request): array
    {
        $librarianWorkingDays = explode(',', $this->librarianRepository->find($request->librarianId)->working_days);

        if (!in_array(date('N'), $librarianWorkingDays)) {
            return ['error' => 'The librarian is not working today', 'status' => Response::HTTP_UNPROCESSABLE_ENTITY];
        }

        if($this->bookItemRepository->find($request->bookItemId)->borrowed) {
            return ['error' => 'The book is currently in use', 'status' => Response::HTTP_UNPROCESSABLE_ENTITY];
        }

        $data = $request->only(['issue_date', 'return_date', 'status']);
        $data['librarian_id'] = $request->librarianId;

        $user = $this->userRepository->with('bookLendings')->find($request->bearerToken());

        if(count($user->expiredLendings()) > 0) {
            return ['error' => 'You have unreturned book. New book can not be borrowed!', 'status' => Response::HTTP_UNPROCESSABLE_ENTITY];
        }

        $this->bookItemRepository->update($request->bookItemId, ['borrowed' => true]); 
        return $this->userRepository->borrowBook($data, $request->bookItemId);
    }
}
