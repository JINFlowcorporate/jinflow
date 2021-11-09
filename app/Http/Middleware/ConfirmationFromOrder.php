<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ConfirmationFromOrder
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
        if (app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName() !== 'checkout')
        {
            return redirect()->route('home');
        }

        return $next($request);
    }
}
