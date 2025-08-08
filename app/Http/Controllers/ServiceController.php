<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function ux()
    {
        return view('services.ux');
    }

    public function web()
    {
        return view('services.web');
    }

    public function seo()
    {
        return view('services.seo');
    }

    public function wordpress()
    {
        return view('services.wordpress');
    }
}