<?php

use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Admin\AdminPasswordController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/product/{id}/download', [ProductController::class, 'downloadPDF'])->name('product.download');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');


Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

Route::middleware('auth:admin')->prefix('admin')->name('admin.')->group(function () {
	Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
	Route::get('/password', [AdminPasswordController::class, 'edit'])->name('password');
	Route::put('/password', [AdminPasswordController::class, 'update'])->name('password.update');
	Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
	Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');
	Route::resource('brands', BrandController::class);
	Route::resource('products', AdminProductController::class)->names(['index' => 'products.index', 'show' => 'products.show']);
	Route::resource('projects', AdminProjectController::class)->names(['index' => 'projects.index', 'show' => 'projects.show']);
	Route::resource('articles', AdminArticleController::class);
	Route::resource('contacts', AdminContactController::class)->only(['index', 'show']);
	Route::resource('media', MediaController::class)->only(['index', 'store', 'destroy']);
});
