<?php
   
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
   
class PostController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function index()
    {
        $user = Auth::user();
        $posts = Post::all();
        return Inertia::render('Posts/Index', ['posts' => $posts, 'user' => $user]);
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create()
    {
        $user = Auth::user();
        return Inertia::render('Posts/Create', ['user' => $user]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'title' => ['required'],
            'body' => ['required'],
            'image' => ['required'],
        ])->validate();
        $imageName = time() . '.' . $request['image']->extension();
        Storage::disk('public')->putFileAs('product/image', $request->image,$imageName);
        Post::create($request->all()+['image'=>$imageName]);
    
        return redirect()->route('posts.index');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function edit(Post $post)
    {
        return Inertia::render('Posts/Edit', [
            'post' => $post
        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        Validator::make($request->all(), [
            'title' => ['required'],
            'body' => ['required'],
        ])->validate();
    
        Post::find($id)->update($request->all());
        return redirect()->route('posts.index');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();
        return redirect()->route('posts.index');
    }



    public function all()
    {
        $posts = Post::all();
        return Inertia::render('Blog', ['posts' => $posts]);
    }

      /**
     * Display the specified resource.
     *
     * @param  Integer  $id
     * @return \Inertia\Inertia
     */
    public function show($id)
    {
        $post = Post::find($id);
        return Inertia::render('Posts/BlogDetail', [
            'post' => $post
        ]);
    }
}    