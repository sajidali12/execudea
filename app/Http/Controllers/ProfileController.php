<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules\Password;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class ProfileController extends Controller
{
    public function edit(Request $request)
    {
        return Inertia::render('Admin/Edit_admin', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
           
        ]);
    }

    public function passUpdate(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', Password::defaults(), 'confirmed'],
            'password_confirmation' => ['required', 'string']
        ]);
    
        $user = $request->user();
    
        if (!Hash::check($validated['current_password'], $user->password)) {
            return back()->withErrors([
                'current_password' => 'The provided password does not match your current password.'
            ]);
        }
    
        if (Hash::check($validated['password'], $user->password)) {
            return back()->withErrors([
                'password' => 'The new password cannot be the same as the current password.'
            ]);
        }
    
        $user->update([
            'password' => Hash::make($validated['password']),
        ]);
    
       
        return back()->with('status', 'Password updated successfully.');
    }
    
}
