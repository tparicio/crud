<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class CheckUserExists
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (! User::find($request->user)) {
              return redirect('/')->with('error', "The user with ID {$request->user} not exists");
        }

        return $next($request);
    }
}
