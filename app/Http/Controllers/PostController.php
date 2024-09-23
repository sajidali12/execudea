<?php
   
namespace App\Http\Controllers;
    
use App\Models\Post;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

   
class PostController extends Controller


{
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
    
        $perPage = $request->input('perPage', 10);
        $perPage = $perPage === 'all' ? Post::count() : (int)$perPage;
    
        $posts = Post::orderBy('created_at', 'desc')->paginate($perPage);
    
        return Inertia::render('Posts/Index', [
            'posts' => $posts,
            'user' => $user,
            'perPage' => $perPage, 
        ]);
    }
    
    public function latestPosts()
    {
        // Fetch the latest 3 posts
        $latestPosts = Post::latest()->take(3)->get();

        return Inertia::render('Welcome', [
            'latestPosts' => $latestPosts,
        ]);
    }
    public function blog()
    {
        $user = Auth::user();
        
        $posts = Post::orderBy('created_at', 'desc')->paginate(6);
        
        $latestPost = Post::orderBy('created_at', 'desc')->first();
        
        return Inertia::render('Blog', [
            'posts' => $posts,
            'user' => $user,
            'latestPost' => $latestPost, // Pass the latest post to the view
        ]);
    }
    public function deleteImage($id)
{
    $post = Post::findOrFail($id);

    if ($post->image) {
        Storage::delete('public/product/image/' . $post->image);
        $post->image = null;
        $post->save();
    }

    return response()->json(['success' => true]);
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
   
//     public function store(Request $request)
// {

//     Validator::make($request->all(), [
//         'title' => ['required'],
//         'body' => ['required'],
//         'author_name' => 'required|string|max:255',
//         'image' => ['nullable', 'image'],
//     ])->validate();

//     if ($request->hasFile('image')) {
//         $image = $request->file('image');
//         $imageName = time() . '.' . $image->getClientOriginalExtension();
//         $image->storeAs('public/product/image', $imageName);

//         Post::create([
//             'title' => $request->input('title'),
//             'body' => $request->input('body'),
//             'author_name'=> $request->input('author_name'),
//             'image' => $imageName,
//         ]);

        

//         return redirect()->route('posts.index');
//     }

//     return redirect()->back()->with('error', 'Image not uploaded');
// }
public function store(Request $request)
{
    $validatedData = $request->validate([
        'title' => ['required'],
        'body' => ['required'],
        'author_name' => 'required|string|max:255',
        'image' => ['required', 'image'],
    ]);

    
    $data = [
        'title' => $validatedData['title'],
        'body' => $validatedData['body'],
        'author_name' => $validatedData['author_name'],
        'image' => null,  
    ];


    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/product/image', $imageName);
        $data['image'] = $imageName;  
    }

    Post::create($data);

    
    return redirect()->route('posts.index')->with('success', 'Post created successfully.');
}



  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
    
        return Inertia::render('Posts/Edit', [
            'post' => $post,
        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
  
   
   
// public function update(Request $request, $id)
// {
    
//     $request->validate([
//         'title' => 'required|string|max:255',
//         'body' => 'required|string',
//         'image' => 'nullable|image',
//         'oldImage' => 'nullable|string',
//     ]);

//     $post = Post::findOrFail($id);

//     $post->title = $request->input('title');
//     $post->body = $request->input('body');

//     try {
//         if ($request->hasFile('image')) {
           
//             if ($post->image && Storage::exists('public/product/image/' . $post->image)) {
//                 Storage::delete('public/product/image/' . $post->image);
//             }
//             $image = $request->file('image');
//             $imageName = time() . '.' . $image->getClientOriginalExtension();
//             $image->storeAs('public/product/image', $imageName);
//             $post->image = $imageName;
//         } else {
           
//             $post->image = $request->input('oldImage', $post->image);
//         }

        
//         $post->save();

//         return redirect()->route('posts.index');
//     } catch (\Exception $e) {
//         Log::error('Error updating post image: ' . $e->getMessage());
//         return redirect()->back()->withErrors(['error' => 'An error occurred while updating the post. Please try again.']);
//     }
// }
public function update(Request $request, $id)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'body' => 'required|string',
        'author_name' => 'required|string|max:255',
        
    ]);

    $post = Post::findOrFail($id);
    $post->update($validated);

    return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
}


    
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index');
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