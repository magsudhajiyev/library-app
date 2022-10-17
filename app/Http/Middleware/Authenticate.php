<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    protected function redirectTo($request): \Illuminate\Http\JsonResponse|string|null
    {
        if ($request->expectsJson())
        {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        if ($request->is('librarian') || $request->is('librarian/*'))
        {
            return route('librarian.login');
        }

        return route('index');
    }
}
