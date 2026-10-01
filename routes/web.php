<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CompanyProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SchoolProfileController;
use Illuminate\Support\Facades\Route;

// ==========================================
// 1. PUBLIC ROUTES
// Pengunjung Publik / Tanpa Login
// ==========================================

Route::get('/', [CompanyProfileController::class, 'index'])
    ->name('home');

Route::get('/companyprofile', [CompanyProfileController::class, 'landing'])
    ->name('companyprofile');

Route::get('/landing', [SchoolProfileController::class, 'index'])
    ->name('landing');

Route::get('/landing2', [SchoolProfileController::class, 'index2'])
    ->name('landing2');


// ==========================================
// PUBLIC ARTICLE ROUTES
// ==========================================

Route::get('/article', [ArticleController::class, 'publicIndex'])
    ->name('article.index');

Route::redirect('/articles', '/article');

Route::get('/product', [ProductController::class, 'publicIndex'])
    ->name('product.index');

Route::get('/article/{article}', [ArticleController::class, 'publicShow'])
    ->name('article.show');

Route::get('/product/{product}', [ProductController::class, 'publicShow'])
    ->name('product.show');

Route::get('/gallery', [GalleryController::class, 'publicIndex'])
    ->name('gallery.index');

Route::view('/contact', 'contact')
    ->name('contact');

Route::post('/contact', [ContactController::class, 'send'])
    ->name('contact.send');

// ==========================================
// 2. AUTHENTICATED / ADMIN ROUTES
// Wajib Login
// ==========================================

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])
  ->name('dashboard');


Route::middleware('auth')->group(function () {

    // ==========================================
    // USER PROFILE ROUTES
    // ==========================================

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    Route::prefix('dashboard')
        ->name('dashboard.')
        ->group(function () {
            Route::get('companyprofile/edit', [CompanyProfileController::class, 'edit'])
                ->name('companyprofile.edit');
            Route::put('companyprofile/update', [CompanyProfileController::class, 'update'])
                ->name('companyprofile.update');

            Route::get('article', [ArticleController::class, 'index'])
                ->name('articles.index');
            Route::get('article/add', [ArticleController::class, 'create'])
                ->name('articles.create');
            Route::post('article', [ArticleController::class, 'store'])
                ->name('articles.store');
            Route::get('article/{article}', [ArticleController::class, 'show'])
                ->name('articles.show');
            Route::get('article/{article}/edit', [ArticleController::class, 'edit'])
                ->name('articles.edit');
            Route::put('article/{article}', [ArticleController::class, 'update'])
                ->name('articles.update');
            Route::delete('article/{article}', [ArticleController::class, 'destroy'])
                ->name('articles.destroy');

            Route::get('product', [ProductController::class, 'index'])
                ->name('products.index');
            Route::get('product/add', [ProductController::class, 'create'])
                ->name('products.create');
            Route::post('product', [ProductController::class, 'store'])
                ->name('products.store');
            Route::get('product/{product}', [ProductController::class, 'show'])
                ->name('products.show');
            Route::get('product/{product}/edit', [ProductController::class, 'edit'])
                ->name('products.edit');
            Route::put('product/{product}', [ProductController::class, 'update'])
                ->name('products.update');
            Route::delete('product/{product}', [ProductController::class, 'destroy'])
                ->name('products.destroy');

            Route::get('gallery', [GalleryController::class, 'index'])
                ->name('galleries.index');
            Route::get('gallery/add', [GalleryController::class, 'create'])
                ->name('galleries.create');
            Route::post('gallery', [GalleryController::class, 'store'])
                ->name('galleries.store');
            Route::get('gallery/{gallery}/edit', [GalleryController::class, 'edit'])
                ->name('galleries.edit');
            Route::put('gallery/{gallery}', [GalleryController::class, 'update'])
                ->name('galleries.update');
            Route::delete('gallery/{gallery}', [GalleryController::class, 'destroy'])
                ->name('galleries.destroy');
        });
});


// ==========================================
// AUTH
// ==========================================

require __DIR__ . '/auth.php';
