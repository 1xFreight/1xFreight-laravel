<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\MetaTagController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\StripeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Home
Route::get('/', [HomeController::class, 'index']);

//Blog
Route::get('/news', [BlogController::class, 'index'])->name('blog');
Route::get('/new/{link}', [BlogController::class, 'show'])->name('blog.show');

//Demo
Route::get('/demo', [DemoController::class, 'index'])->name('demo');
Route::post('/store', [DemoController::class, 'store'])->name('demo.store');

//Test Stripe
Route::get('/packages', [StripeController::class, 'showPackages']);

// Info
Route::get('/termeni-si-conditii', [InfoController::class, 'indexTerms'])->name('terms');
Route::get('/politica-de-confidentialitate', [InfoController::class, 'indexPolicy'])->name('policy');

/*
     * Admin dashboard
     */
    Route::group(['middleware' => ['auth', 'admin']], function () {

        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/logout', [DashboardController::class, 'logout'])->name('logout');

        Route::get('/dashboard/booking', [BookingController::class, 'index'])->name('dashboard.booking');
        Route::get('/dashboard/booking/{id}', [BookingController::class, 'show'])->name('dashboard.booking.details');
        //Create book
//        Route::get('/dashboard/booking/create', [BookingController::class, 'createBook'])->name('dashboard.booking.create');
        Route::get('/dashboard/create-booking', [BookingController::class, 'createBook'])->name('booking.create');
        Route::post('/dashboard/booking/store', [BookingController::class, 'store'])->name('dashboard.booking.store');

        //edit book
        Route::get('/dashboard/booking/{id}/edit', [BookingController::class, 'edit'])->name('dashboard.booking.edit');
        Route::put('/dashboard/booking/{id}', [BookingController::class, 'update'])->name('dashboard.booking.update');
        //delete book
        Route::delete('/dashboard/booking/{id}', [BookingController::class, 'destroy'])->name('dashboard.booking.destroy');

        // Ckeditor
        Route::post('/upload', [UploadController::class, 'upload'])->name('ckeditor.upload');

        // Contact form
        // Route::get('/dashboard/contact-form', [ContactController::class, 'queries'])->name('dashboard.contact.form');
        // Route::post('/dashboard/contact-form/viewed', [ContactController::class, 'setViewed'])->name('dashboard.contact.form.viewed');

        // Blog
        Route::get('/dashboard/blog', [BlogController::class, 'dashboardIndex'])->name('dashboard.blog');
        Route::get('/dashboard/blog/create', [BlogController::class, 'create'])->name('dashboard.blog.create');
        Route::post('/dashboard/blog/store', [BlogController::class, 'store'])->name('dashboard.blog.store');
        Route::get('/dashboard/blog/edit/{id}', [BlogController::class, 'edit'])->name('dashboard.blog.edit');
        Route::post('/dashboard/blog/update', [BlogController::class, 'update'])->name('dashboard.blog.update');
        Route::get('/dashboard/blog/destroy/{id}', [BlogController::class, 'destroy'])->name('dashboard.blog.destroy');
        Route::get('/dashboard/blog/destroy/image/{id}', [BlogController::class, 'destroyImage'])->name('dashboard.blog.destroy.image');

        // Policy
        Route::get('/dashboard/policy', [InfoController::class, 'editPolicy'])->name('dashboard.policy');
        Route::post('/dashboard/policy/update', [InfoController::class, 'updatePolicy'])->name('dashboard.policy.update');

        // Terms
        Route::get('/dashboard/terms', [InfoController::class, 'editTerms'])->name('dashboard.terms');
        Route::post('/dashboard/terms/update', [InfoController::class, 'updateTerms'])->name('dashboard.terms.update');

        // Meta tags
        Route::get('/dashboard/meta', [MetaTagController::class, 'dashboardIndex'])->name('dashboard.meta');
        Route::get('/dashboard/meta/create', [MetaTagController::class, 'create'])->name('dashboard.meta.create');
        Route::post('/dashboard/meta/store', [MetaTagController::class, 'store'])->name('dashboard.meta.store');
        Route::get('/dashboard/meta/edit/{id}', [MetaTagController::class, 'edit'])->name('dashboard.meta.edit');
        Route::post('/dashboard/meta/update', [MetaTagController::class, 'update'])->name('dashboard.meta.update');
        Route::get('/dashboard/meta/destroy/{id}', [MetaTagController::class, 'destroy'])->name('dashboard.meta.destroy');
        Route::get('/dashboard/meta/destroy/image/{id}', [MetaTagController::class, 'destroyImage'])->name('dashboard.meta.destroy.image');


    });
