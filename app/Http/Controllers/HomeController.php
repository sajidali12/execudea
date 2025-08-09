<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $latestPosts = Post::orderBy('created_at', 'desc')->take(6)->get();
        $featuredProjects = Project::showOnWebsite()
            ->with('client')
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();
        
        return view('home', compact('latestPosts', 'featuredProjects'));
    }

    public function about()
    {
        return view('about');
    }
}