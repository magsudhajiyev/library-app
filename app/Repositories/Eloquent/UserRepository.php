<?php

namespace App\Repositories\Eloquent;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    protected User $user;
    public array $with = [];

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function with(...$relations): UserRepository
    {
        $this->with = $relations;

        return $this;
    }

    public function find($token): User
    {
        return $this->user = $this->user->with($this->with)->whereApiToken($token)->first();
    }

    public function borrowBook($data, $bookId): array
    {
        $this->user->bookLendings()->attach([$bookId => $data]);

        return ['message' => 'Successfully borrowed the book!', 'status' => 200];
    }
}
