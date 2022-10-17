<?php

namespace App\Interfaces;

use App\Models\User;

interface UserRepositoryInterface
{
    public function with(...$relations): UserRepositoryInterface;
    public function find($token): User;
    public function borrowBook($data, $bookId): array;
}
