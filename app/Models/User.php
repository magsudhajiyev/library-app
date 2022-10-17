<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'api_token',
    ];

    public function bookLendings(): BelongsToMany
    {
        return $this->belongsToMany(BookItem::class, 'book_lendings')->withPivot('librarian_id', 'issue_date', 'return_date', 'status');
    }

    public function activeLendings(): Collection
    {
        return $this->bookLendings()->where('status', true)->whereDate('return_date', '>', now())->get();
    }

    public function expiredLendings(): Collection
    {
        return $this->bookLendings()->where('status', false)->whereDate('return_date', '<=', now())->get();
    }
}
