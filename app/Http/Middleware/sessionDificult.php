<?php

namespace App\Http\Middleware;

use Closure;

class sessionDificult
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
        if(session('dificuldade') == NULL || session('qtd_questoes') == NULL)
            return redirect('/');
        else
            return $next($request);
    }
}
