<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ServiceProviderController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\ServiceLocationController;
use App\Http\Controllers\ServiceReviewController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookDemoController;
use App\Http\Controllers\EmailTestController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    // Service Provider Routes
    Route::resource('service-providers', ServiceProviderController::class);
    
    // Service Routes
    Route::resource('services', ServiceController::class);
    
    // Service Category Routes
    Route::resource('service-categories', ServiceCategoryController::class);
    
    // Service Location Routes
    Route::resource('service-locations', ServiceLocationController::class);
    
    // Service Review Routes
    Route::resource('service-reviews', ServiceReviewController::class);
    
});

// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Guest routes (login)
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AdminLoginController::class, 'login'])->name('login.submit');
    });

    // Protected admin routes
    Route::middleware(['web', 'auth', \App\Http\Middleware\AdminMiddleware::class])->group(function () {
        Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::resource('users', UserController::class);
        Route::resource('services', AdminServiceController::class);
        Route::resource('locations', ServiceLocationController::class);
        Route::get('/demo-requests', [App\Http\Controllers\Admin\DemoRequestController::class, 'index'])->name('demo-requests.index');
        Route::get('/demo-requests/{demoRequest}', [App\Http\Controllers\Admin\DemoRequestController::class, 'show'])->name('demo-requests.show');
        Route::patch('/demo-requests/{demoRequest}/status', [App\Http\Controllers\Admin\DemoRequestController::class, 'updateStatus'])->name('demo-requests.update-status');
    });
});

// Blog Routes
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{post}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/book-demo', [BookDemoController::class, 'show'])->name('book-demo');
Route::post('/book-demo', [BookDemoController::class, 'store'])->name('book-demo.store');

// Email test route (only in development)
if (app()->environment('local', 'development')) {
    Route::get('/test-email', [EmailTestController::class, 'testEmail']);
}

// Debug route to check services
Route::get('/debug/services', function () {
    $services = \App\Models\Service::with(['category', 'serviceProvider', 'location', 'reviews'])->get();
    
    $debug = [
        'total_services' => $services->count(),
        'services' => $services->map(function($service) {
            return [
                'id' => $service->id,
                'title' => $service->title,
                'has_category' => $service->category ? true : false,
                'has_provider' => $service->serviceProvider ? true : false,
                'has_location' => $service->location ? true : false,
                'review_count' => $service->reviews->count()
            ];
        })
    ];
    
    return response()->json($debug);
})->middleware(['auth'])->name('debug.services');
