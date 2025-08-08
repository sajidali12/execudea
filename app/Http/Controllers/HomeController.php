<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $latestPosts = Post::orderBy('created_at', 'desc')->take(6)->get();
        
        return view('home', compact('latestPosts'));
    }

    public function about()
    {
        return view('about');
    }
}