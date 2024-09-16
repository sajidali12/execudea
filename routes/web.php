<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\PostController;

use App\Http\Controllers\YourController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('admin/login'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});



Route::get ('/services/{id}', function(){
  return Inertia::render ("services");
});


Route::get('/contact', function () {
    return Inertia::render('Contact');
});
Route::post('/message', [MessageController::class, 'msg'])->name('msg');


Route::get('/about', function () {
    return Inertia::render('About');
});

Route::get('/blog', [PostController::class, 'all'])->name('blog.all');
Route::get('/blog', [PostController::class, 'blog'])->name('blog');
Route::get('/blog/{id}-{title}', [PostController::class, 'show'])->name('blog.detail');
Route::get('/', [PostController::class, 'latestPosts'])->name('posts.latest');


require __DIR__.'/auth.php';
Route::get('/admin/dashboard', function () {
    return Inertia::render('Admin/AdminProjects');    
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('admin/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('admin/profile', [ProfileController::class, 'passUpdate'])->name('passwordUpdate');
});


Route::get('/admin/projects', function () {
    return Inertia::render('Admin/AdminProjects');
})->middleware(['auth', 'verified'])->name('admin-projects');

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'show'])->name('admin-dashboard');
    Route::get('/admin/settings', [AdminController::class, 'edit'])->name('admin-settings');
    Route::resource('/admin/posts', PostController::class);
    Route::delete('/admin/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::get('/admin/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/admin/posts/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::get('/admin/messages', [MessageController::class, 'index'])->name('admin.messages.index');
    Route::delete('/admin/messages/{id}', [MessageController::class, 'destroy'])->name('admin.messages.destroy');



            });
Route::middleware(['web'])->group(function () {
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
            ->name('logout');
            });


Route::get('/{any}', [YourController::class, 'showNotFound'])->where('any', '.*');

