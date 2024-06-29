<?php

namespace App\Bootstrappers;

use App\Http\Middleware\EnsureUserHasRole;
use Illuminate\Foundation\Configuration\Middleware;

class MiddlewareBootstrapper
{
    public function __invoke(Middleware $middleware): void
    {
        $middleware->redirectGuestsTo(fn () => route('register'));

        $middleware->statefulApi();
        $middleware->throttleApi();

        $middleware->alias([
            'hasRole' => EnsureUserHasRole::class,
        ]);
    }
}
