<?php

namespace App\Repositories\Eloquent;

use App\Interfaces\BookItemRepositoryInterface;
use App\Models\BookItem;

class BookItemRepository implements BookItemRepositoryInterface
{
    protected BookItem $bookItem;

    public function __construct(BookItem $bookItem)
    {
        $this->bookItem = $bookItem;
    }

    public function find($id): BookItem
    {
        return $this->bookItem->findOrFail($id);
    }

    public function update($id, array $data): bool
    {
        return $this->bookItem->findOrFail($id)->update($data);
    }
}
