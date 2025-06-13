<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Container\Attributes\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class cekLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next, $role): Response
    // {
    //     if (Auth::check() && Auth::user()->role !== $role) {
    //         return redirect('/')->with('error', 'Anda tidak memiliki akses.');
    //     }

    //     return $next($request);
    // }

    public function handle(Request $request, Closure $next, $role): Response
    {

        if (!Auth::check() || Auth::user()->role !== $role) {
            return redirect('/')->with('error', 'Anda tidak memiliki akses.');
        }

        return $next($request);
    }


    // public function handle(Request $request, Closure $next, $role): Response
    // {
    //     if (!Auth::check()) {
    //         return redirect('/login');
    //     }

    //     $userRole = Auth::user()->role;

    //     // Debug - hapus setelah testing
    //     dd([
    //         'method' => $request->method(),
    //         'route_name' => $request->route()->getName(),
    //         'user' => Auth::user(),
    //         'middlewares' => $request->route()->gatherMiddleware(),
    //         'csrf_token' => $request->session()->token(),
    //         'request_token' => $request->input('_token')
    //     ]);

    //     if ($userRole !== $role) {
    //         abort(403, 'Access denied');
    //     }

    //     return $next($request);
    // }


    // public function handle(Request $request, Closure $next, $level): Response
    // {
    //     $user = $request->user();

    //     if (!$user) {
    //         return redirect('/login');
    //     }

    //     if ($user->role !== $level) {
    //         return redirect('/berita')->with('error', 'Kamu tidak punya akses sebagai ' . $level);
    //     }

    //     return $next($request);
    // }
}
