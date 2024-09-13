<?php
namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // Check if the request expects JSON, if so, return null to avoid redirect
        if ($request->expectsJson()) {
            return null;
        }

        // Redirect to the custom admin login page
        return route('login');
    }
}
