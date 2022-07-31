<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class IsFornecedor
{

    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('fornecedor')->check()) {
            return $next($request);
        }
        return redirect()->route('loginFornecedor');
    }
}
