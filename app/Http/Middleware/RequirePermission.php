<?php

namespace App\Http\Middleware;

use App\Models\Feature;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RequirePermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $feature_name, $permission_name): Response
    {

        if (auth('web')->check() && auth('web')->user()->hasPermission($feature_name, $permission_name)) {
            return $next($request);
        }
        abort(404);
    }
}
