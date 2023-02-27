<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\FileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [EtudiantController::class, 'index'])->name('blog.index');
Route::get('/blog', [EtudiantController::class, 'index'])->name('blog.index');

Route::get('blog/{etudiant}', [EtudiantController::class, 'show'])->name('blog.show');

Route::get('blog-create', [EtudiantController::class, 'create'])->name('blog.create');
Route::post('blog-create', [EtudiantController::class, 'store'])->name('store');

Route::get('blog-edit/{etudiant}', [EtudiantController::class, 'edit'])->name('blog.edit');
Route::put('blog-edit/{etudiant}', [EtudiantController::class, 'update'])->name('update');

Route::delete('blog-edit/{etudiant}', [EtudiantController::class, 'destroy'])->name('destroy');



Route::get('/forum', [BlogPostController::class, 'index'])->name('forum.index')->middleware('auth');

Route::get('forum/{blogPost}', [BlogPostController::class, 'show'])->name('forum.show')->middleware('auth');

Route::get('forum-create', [BlogPostController::class, 'create'])->name('forum.create')->middleware('auth');
Route::post('forum-create', [BlogPostController::class, 'store'])->name('store')->middleware('auth');

Route::get('forum-edit/{blogPost}', [BlogPostController::class, 'edit'])->name('forum.edit')->middleware('auth');
Route::put('forum-edit/{blogPost}', [BlogPostController::class, 'update'])->name('update')->middleware('auth');

Route::delete('forum-edit/{blogPost}', [BlogPostController::class, 'destroy'])->name('destroy')->middleware('auth');

// Route::get('blog-pdf/{blogPost}', [BlogPostController::class, 'pdf'])->name('blog.pdf')->middleware('auth');



Route::get('registration', [CustomAuthController::class, 'create'])->name('user.create');
Route::post('registration', [CustomAuthController::class, 'store'])->name('user.store');

Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('login', [CustomAuthController::class, 'authentication'])->name('user.auth');
Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout');

Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');



Route::get('/lang/{locale}', [LocalizationController::class, 'index'])->name('lang');



Route::get('/repo', [FileController::class, 'index'])->name('file.index')->middleware('auth');

Route::get('repo/{file}', [FileController::class, 'show'])->name('file.show')->middleware('auth');

Route::get('repo-create', [FileController::class, 'create'])->name('file.create')->middleware('auth');
Route::post('repo-create', [FileController::class, 'store'])->name('store')->middleware('auth');

Route::get('repo-edit/{file}', [FileController::class, 'edit'])->name('file.edit')->middleware('auth');
Route::put('repo-edit/{file}', [FileController::class, 'update'])->name('update')->middleware('auth');

Route::delete('repo-edit/{file}', [FileController::class, 'destroy'])->name('destroy')->middleware('auth');

Route::get('repo-download/{file}', [FileController::class, 'download'])->name('file.download')->middleware('auth');
