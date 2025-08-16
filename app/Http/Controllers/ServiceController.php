<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function show(Service $service)
    {
        if (!$service->is_active) {
            abort(404);
        }

        return view('services.show', compact('service'));
    }
}