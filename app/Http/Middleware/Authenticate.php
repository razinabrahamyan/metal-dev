<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{

    public function handle($request, Closure $next, ...$guards)
    {
        if (auth()->guard('admin')->check()) {
            auth()->logout();
        }
        if (auth()->check()) {
            auth()->guard('admin')->logout();
        }
        $this->authenticate($request, $guards);

        return $next($request);

    }
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {

        if (! $request->expectsJson()) {
            return route('guest.home');
        }
    }

    protected function unauthenticated($request, array $guards)
    {
        session()->flash('should_login','sdfsdf');
        throw new AuthenticationException(
            'Unauthenticated.', $guards, $this->redirectTo($request)
        );
    }

}
