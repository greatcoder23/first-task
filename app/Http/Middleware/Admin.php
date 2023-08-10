<?php

namespace App\Http\Middleware;

use App\Http\Common\AppEnumConstant;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure(Request): (Response|RedirectResponse) $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->role_type == getAppEnumId(AppEnumConstant::ROLE_TYPE, AppEnumConstant::ROLE_TYPE_ADMIN)) {
            return $next($request);
        }

        return redirect('dashboard')->with('error', "You don't have admin access.");
    }
}
