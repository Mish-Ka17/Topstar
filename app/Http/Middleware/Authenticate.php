<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Closure;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }

    public function handle($request, Closure $next, ...$guards)
    {
        if (! Auth::check()) {
            return redirect()->route('home');
        //     ->withErrors([
        //     'email' => 'Войдите или зарегистрируйтесь',
        // ])->onlyInput('email');
        }

        return $next($request);
    }
}
