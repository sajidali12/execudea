<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Facades\Auth;

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
        return Inertia::render('Admin/Edit', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
        ]);
    }
}
