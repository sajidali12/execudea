<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules\Password;
use App\Http\Requests\ProfileUpdateRequest;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AdminController extends Controller
{
    //
    
    public function show(): Response
    {
        $user = Auth::user();
        return Inertia::render('Admin/AdminDashboard', [
            'user' => $user
        ]);
    }

    public function edit(Request $request): Response
    {
        return Inertia::render('Admin/Edit_admin', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
        ]);
    
    }
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', Password::defaults(), 'confirmed'],
        ]);
    
        $user = $request->user();
        if (!Hash::check($validated['current_password'], $user->password)) {
            return back()->withErrors(['current_password' => 'The provided password does not match your current password.']);
        }
    
        if (Hash::check($validated['password'], $user->password)) {
            return back()->withErrors(['password' => 'The new password cannot be the same as the current password.']);
        }
    
        $user->update([
            'password' => Hash::make($validated['password']),
        ]);
    
        return to_route('admin/profile');
    }
    

   
}
