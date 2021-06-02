<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Authenticate
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
        if (Auth::check())
        {
            $authId = Auth::user()->id;
            return $next($request);
        }
        return redirect('/')->with('error','You have not authenticate person');
    }
}
