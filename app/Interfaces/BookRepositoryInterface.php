<?php

namespace App\Interfaces;

use App\Models\Book;

interface BookRepositoryInterface
{
    public function store($request): Book;
    public function find($id): Book;
    public function update($id, array $data): bool;
    public function delete($id): bool;
}
