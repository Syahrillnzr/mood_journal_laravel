<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role): Response
    {
        $user = Auth::user();

        if (! $user) {
            return redirect()->route('login');
        }

if ((int) $user->role !== (int) $role) {
        // redirect user based on their actual role
        switch ((int) $user->role) {
            case 1: // Admin
                return redirect()->route('admin.dashboard');
            default: // Normal user
                return redirect()->route('user.dashboard'); // or some user landing page
        }
    }

        return $next($request);
    }
}
