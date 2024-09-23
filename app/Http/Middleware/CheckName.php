<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckName
{
    public function handle(Request $request, Closure $next)
    {
        if (isEmptyOrNullString($request->name)) {
            return redirect('home');
        }

        return $next($request);
    }
}
