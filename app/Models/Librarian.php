<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Librarian extends Authenticatable
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
    ];

    public function issuedBooks(): BelongsToMany
    {
        return $this->belongsToMany(BookItem::class, 'book_lendings')->withPivot('user_id', 'issue_date', 'return_date', 'status');
    }
}
