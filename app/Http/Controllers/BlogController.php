<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::published()->orderBy('created_at', 'desc')->paginate(10);
        
        return view('blog.index', compact('posts'));
    }

    public function show(Post $post)
    {
        // Drafts are only visible to logged-in admins/editors (for previewing).
        if (! $post->isPublished() && ! auth()->user()?->canAccessAdminPanel()) {
            abort(404);
        }

        return view('blog.show', compact('post'));
    }
}