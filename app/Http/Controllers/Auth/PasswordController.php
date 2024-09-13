<?php

namespace App\Http\Controllers\Auth;

use Inertia\Inertia;
use Illuminate\Http\Request;
// use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules\Password;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Inertia\Response;
// use Symfony\Component\HttpFoundation\Response;

class PasswordController extends Controller
{

    
    public function show(): Response
    {
        $user = Auth::user();
        return Inertia::render('Admin/AdminDashboard', [
            'user' => $user
        ]);
    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): Response
    {
        return Inertia::render('Admin/Edit_admin', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
        ]);
    
    }
    /**
     * Update the user's password.
     */
    public function passUpdate(Request $request): RedirectResponse
{
    // Validate the incoming request
    $validated = $request->validate([
        'current_password' => ['required', 'string'],
        'password' => ['required', 'string', Password::defaults(), 'confirmed'],
    ]);

    // Retrieve the currently authenticated user
    $user = $request->user();

    // Check if the provided current password matches the one in the database
    if (!Hash::check($validated['current_password'], $user->password)) {
        // Return back with error if current password does not match
        return back()->withErrors(['current_password' => 'The provided password does not match your current password.']);
    }

    // Check if the new password is the same as the current password (by comparing the hash of the new password with the current password hash)
    if (Hash::check($validated['password'], $user->password)) {
        return back()->withErrors(['password' => 'The new password cannot be the same as the current password.']);
    }

    // Update the user's password in the database
    $user->update([
        'password' => Hash::make($validated['password']),
    ]);

    // Redirect back with a success message
    return back()->with('status', 'Password updated successfully.');
}


    
}
