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

        if (!$user) {
            return redirect()->route('login');
        }

        // dd([
        //     'user_role' => $user->role,
        //     'user_role_type' => gettype($user->role),
        //     'required_role' => $role,
        //     'required_role_type' => gettype($role),
        //     'match' => $user->role === (int) $role,
        // ]);
            
        if ($user->role !== (int) $role) {  // $role from route is still a string so keep one cast
            switch ($user->role) {
                case 1:
                    return redirect()->route('admin.dashboard');
                default:
                    return redirect()->route('user.dashboard');
            }
        }

        return $next($request);
    }
}
