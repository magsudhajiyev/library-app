<?php

namespace App\Providers;

use App\Interfaces\BookRepositoryInterface;
use App\Interfaces\BookItemRepositoryInterface;
use App\Interfaces\LibrarianRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\Eloquent\BookRepository;
use App\Repositories\Eloquent\BookItemRepository;
use App\Repositories\Eloquent\LibrarianRepository;
use App\Repositories\Eloquent\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected array $repos = [
        BookRepositoryInterface::class => BookRepository::class,
        LibrarianRepositoryInterface::class => LibrarianRepository::class,
        UserRepositoryInterface::class => UserRepository::class,
        BookItemRepositoryInterface::class => BookItemRepository::class
    ];

    public function register()
    {
        foreach ($this->repos as $interface => $repo) {
            $this->app->bind($interface, $repo);
        }
    }

    public function boot()
    {
        //
    }
}
