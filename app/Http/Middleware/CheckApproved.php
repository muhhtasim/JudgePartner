<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckApproved
{
    /**
     * Handle an incoming request.
     *
     * Blocks authenticated users whose accounts are not yet approved by an Admin.
     * - pending  → logged out and redirected to login with an info message
     * - rejected → logged out and redirected to login with the rejection reason
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            /** @var \App\Models\User $user */
            $user = Auth::user();

            if ($user->isRejected()) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect()->route('login')
                    ->with('status', 'Your account was rejected: '.($user->rejected_reason ?? 'No reason provided.'));
            }

            if ($user->isPending()) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect()->route('login')
                    ->with('status', 'Your account is awaiting Admin approval.');
            }
        }

        return $next($request);
    }
}
