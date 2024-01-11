<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$roles)
    {
    if (! $request->user() || ! in_array($request->user()->role, $roles)) {
        // Redirect atau pesan error jika pengguna tidak memiliki role yang sesuai
        return redirect()->back();  // Misalnya kembali ke halaman beranda
    }

    return $next($request);
    }

}
