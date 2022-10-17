<?php

namespace App\Repositories\Eloquent;

use App\Interfaces\LibrarianRepositoryInterface;
use App\Models\Librarian;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class LibrarianRepository implements LibrarianRepositoryInterface
{
    protected Librarian $librarian;
    protected array $with = [];
    protected array $withCount = [];

    public function __construct(Librarian $librarian)
    {
        $this->librarian = $librarian;
    }

    public function instance(): Librarian
    {
        return $this->librarian;
    }

    public function with(...$relations): LibrarianRepository
    {
        $this->with = $relations;

        return $this;
    }

    public function withCount(...$relations): LibrarianRepository
    {
        $this->withCount = $relations;

        return $this;
    }

    public function all(): Collection
    {
        return $this->librarian->with($this->with)->withCount($this->withCount)->get();
    }

    public function monthlyReport(): Collection
    {
        @$this->withCount['issuedBooks'] = function ($q) {
            $q->whereMonth('issue_date', now()->month);
        };

        return $this->librarian
            ->with($this->with)
            ->withCount($this->withCount)
            ->get();
    }

    public function first(): Builder|Model
    {
        return $this->librarian->with($this->with)->withCount($this->withCount)->firstOrFail();
    }

    public function find($id): Librarian
    {
        return $this->librarian = $this->librarian->findOrFail($id);
    }
}
