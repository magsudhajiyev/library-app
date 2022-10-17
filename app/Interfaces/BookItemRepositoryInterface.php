<?php

namespace App\Interfaces;

use App\Models\BookItem;

interface BookItemRepositoryInterface
{
    public function find($id): BookItem;
    public function update($id, array $data): bool;
}
