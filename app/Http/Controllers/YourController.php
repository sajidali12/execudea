<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class YourController extends Controller
{
    public function showNotFound()
    {
        return Inertia::render('notFound');
    }
}