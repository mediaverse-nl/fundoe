<?php

namespace App\Http\Middleware;

use Closure;

class CanOrderMiddleware
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
        if (auth()->check()){
            if (auth()->user()->country == '' || auth()->user()->state == ''
                || auth()->user()->city == '' || auth()->user()->postal_code == ''
                || auth()->user()->address == '' || auth()->user()->address_number == ''
                || auth()->user()->first_name == '' || auth()->user()->last_name == '' ){
                return redirect()
                    ->route('auth.account.edit')
                    ->withErrors(['msg' => 'Om een event te kunnen boeken, moet u dit formulier invullen.']);
            }
            return $next($request);
        }
        return redirect()->route('login');
    }
}
