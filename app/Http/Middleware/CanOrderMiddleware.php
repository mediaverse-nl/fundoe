<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class CanOrderMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()){
            if (auth()->user()->userDataIncompleted()){
                return redirect()
                    ->route('auth.account.edit')
                    ->withErrors([
                        'msg' => '<p class="text-danger">Om een event te kunnen <b>boeken</b>, moet u dit formulier invullen.</p>'
                    ])
                    ->withInput(['incomplete' => true]);
            }
            return $next($request);
        }
        return redirect()->route('login');
    }
}
