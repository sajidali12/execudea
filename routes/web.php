<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\YourController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\CourseController as AdminCourseController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\ClientController as AdminClientController;
use App\Http\Controllers\Admin\CourseRegistrationController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\InvoiceController as AdminInvoiceController;
use App\Http\Controllers\Admin\ExpenseController as AdminExpenseController;
use App\Http\Controllers\Admin\FinancialReportController;
use App\Http\Controllers\Admin\TeamController as AdminTeamController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Main website routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');

// Service routes
Route::get('/User-Experience-Design', [ServiceController::class, 'ux'])->name('service.ux');
Route::get('/web-development', [ServiceController::class, 'web'])->name('service.web');
Route::get('/Search-Engine-Optimization', [ServiceController::class, 'seo'])->name('service.seo');
Route::get('/Wordpress-development', [ServiceController::class, 'wordpress'])->name('service.wordpress');

// Blog routes
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');

// Contact routes
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Course routes
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/{course:slug}', [CourseController::class, 'show'])->name('courses.show');
Route::post('/courses/{course:slug}/register', [CourseController::class, 'register'])->name('courses.register');


require __DIR__.'/auth.php';

// Remove this duplicate dashboard route - it's handled below

Route::middleware('auth')->group(function () {
    Route::get('admin/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('admin/profile', [ProfileController::class, 'passUpdate'])->name('passwordUpdate');
});



// Routes accessible to both admin and editor
Route::middleware(['auth', 'role:admin,editor'])->group(function () {
    // Dashboard (accessible to all admin users)
    Route::get('/admin/dashboard', [AdminController::class, 'show'])->name('admin-dashboard');
    Route::get('/admin/settings', [AdminController::class, 'edit'])->name('admin-settings');
    Route::put('/admin/settings', [AdminController::class, 'update'])->name('admin-settings');
    
    // Posts Management (accessible to admin and editor)
    Route::resource('/admin/posts', PostController::class);
    Route::delete('/admin/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::get('/admin/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/admin/posts/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{id}/image', [PostController::class, 'deleteImage'])->name('posts.deleteImage');
    
    // Messages (accessible to all admin users)
    Route::get('/admin/messages', [MessageController::class, 'index'])->name('admin.messages.index');
    Route::delete('/admin/messages/{id}', [MessageController::class, 'destroy'])->name('admin.messages.destroy');
    
    // Site Settings Routes (accessible to admin and editor)
    Route::get('/admin/site-settings', [SiteSettingController::class, 'index'])->name('admin.settings.index');
    Route::put('/admin/site-settings', [SiteSettingController::class, 'update'])->name('admin.settings.update');
    
    // Courses Management Routes (accessible to admin and editor)
    Route::resource('/admin/courses', AdminCourseController::class)->names([
        'index' => 'admin.courses.index',
        'create' => 'admin.courses.create',
        'store' => 'admin.courses.store',
        'show' => 'admin.courses.show',
        'edit' => 'admin.courses.edit',
        'update' => 'admin.courses.update',
        'destroy' => 'admin.courses.destroy',
    ]);
    
    // Course Registrations (accessible to admin and editor)
    Route::resource('/admin/course-registrations', CourseRegistrationController::class)->only([
        'index', 'destroy'
    ])->names([
        'index' => 'admin.course-registrations.index',
        'destroy' => 'admin.course-registrations.destroy',
    ]);
});

// Admin-only routes (user management, client management, office management)
Route::middleware(['auth', 'role:admin'])->group(function () {
    // User Management (Admin only)
    Route::resource('/admin/users', AdminUserController::class)->names([
        'index' => 'admin.users.index',
        'create' => 'admin.users.create',
        'store' => 'admin.users.store',
        'show' => 'admin.users.show',
        'edit' => 'admin.users.edit',
        'update' => 'admin.users.update',
        'destroy' => 'admin.users.destroy',
    ]);
    
    // Client Management Routes (Admin only)
    Route::resource('/admin/clients', AdminClientController::class)->names([
        'index' => 'admin.clients.index',
        'create' => 'admin.clients.create',
        'store' => 'admin.clients.store',
        'show' => 'admin.clients.show',
        'edit' => 'admin.clients.edit',
        'update' => 'admin.clients.update',
        'destroy' => 'admin.clients.destroy',
    ]);
    
    // Projects Management Routes (Admin only)
    Route::resource('/admin/projects', AdminProjectController::class)->names([
        'index' => 'admin.projects.index',
        'create' => 'admin.projects.create',
        'store' => 'admin.projects.store',
        'show' => 'admin.projects.show',
        'edit' => 'admin.projects.edit',
        'update' => 'admin.projects.update',
        'destroy' => 'admin.projects.destroy',
    ]);
    
    // Invoices Management Routes (Admin only)
    Route::resource('/admin/invoices', AdminInvoiceController::class)->names([
        'index' => 'admin.invoices.index',
        'create' => 'admin.invoices.create',
        'store' => 'admin.invoices.store',
        'show' => 'admin.invoices.show',
        'edit' => 'admin.invoices.edit',
        'update' => 'admin.invoices.update',
        'destroy' => 'admin.invoices.destroy',
    ]);
    
    // Invoice PDF Routes
    Route::get('/admin/invoices/{invoice}/pdf/download', [AdminInvoiceController::class, 'downloadPdf'])->name('admin.invoices.pdf.download');
    Route::get('/admin/invoices/{invoice}/pdf/view', [AdminInvoiceController::class, 'viewPdf'])->name('admin.invoices.pdf.view');
    
    // Expenses Management Routes (Admin only)
    Route::resource('/admin/expenses', AdminExpenseController::class)->names([
        'index' => 'admin.expenses.index',
        'create' => 'admin.expenses.create',
        'store' => 'admin.expenses.store',
        'show' => 'admin.expenses.show',
        'edit' => 'admin.expenses.edit',
        'update' => 'admin.expenses.update',
        'destroy' => 'admin.expenses.destroy',
    ]);
    
    // Financial Reports Routes (Admin only)
    Route::get('/admin/reports', [FinancialReportController::class, 'index'])->name('admin.reports');
    Route::post('/admin/reports/export', [FinancialReportController::class, 'export'])->name('admin.reports.export');
    
    // Team Management Routes (Admin only)
    Route::resource('/admin/teams', AdminTeamController::class)->names([
        'index' => 'admin.teams.index',
        'create' => 'admin.teams.create',
        'store' => 'admin.teams.store',
        'show' => 'admin.teams.show',
        'edit' => 'admin.teams.edit',
        'update' => 'admin.teams.update',
        'destroy' => 'admin.teams.destroy',
    ]);
});
    
Route::middleware(['web'])->group(function () {
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
            ->name('logout');
            });


Route::get('/{any}', [YourController::class, 'showNotFound'])->where('any', '.*');

