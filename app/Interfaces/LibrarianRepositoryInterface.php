<?php

namespace App\Interfaces;

use App\Models\Librarian;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface LibrarianRepositoryInterface
{
    public function instance(): Librarian;
    public function with(...$relations): LibrarianRepositoryInterface;
    public function withCount(...$relations): LibrarianRepositoryInterface;
    public function all(): Collection;
    public function find($id): Librarian;
    public function first(): Builder|Model;
    public function monthlyReport(): Collection;
}
