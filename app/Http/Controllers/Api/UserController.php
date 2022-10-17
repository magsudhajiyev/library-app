<?php

namespace App\Http\Controllers\Api;

use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\BorrowRequest;


class UserController extends BaseController
{
    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function borrowBook(BorrowRequest $request): JsonResponse
    {
        try {
            $result = $this->userService->borrowBook($request, $request->librarianId, $request->bookItemId);
        } catch (\Exception $e) {
            $result = [
              'status' => 500,
              'error' => $e->getMessage()
            ];
        }

        return $this->jsonResponse($result, $result['status']);
    }
}
