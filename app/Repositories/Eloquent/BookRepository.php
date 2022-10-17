<?php

namespace App\Repositories\Eloquent;

use App\Interfaces\BookRepositoryInterface;
use App\Models\Book;

class BookRepository implements BookRepositoryInterface
{
    protected Book $book;

    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    public function store($request): Book 
    {
        return $this->book->create($request->toArray());
    }

    public function find($id): Book
    {
        return $this->book->findOrFail($id);
    }

    public function update($id, array $data): bool
    {
        return $this->book->findOrFail($id)->update($data);
    }

    public function delete($id) : bool
    {
        return $this->book->findOrFail($id)->destroy($id);
    }
}
