<?php

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

use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\LocalizationController;

Route::get('/', [UserController::class, 'login'])->name('auth.login');
Route::post('/', [UserController::class, 'auth']);
Route::get('logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('etudiant', [EtudiantController::class, 'index'])->name('etudiant.index');
Route::get('etudiant/{etudiant}', [EtudiantController::class, 'show'])->name('etudiant.show')->middleware('auth');;

Route::get('etudiant-create', [EtudiantController::class, 'create'])->name('etudiant.create');
Route::post('etudiant-create', [EtudiantController::class, 'store'])->name('etudiant.store');

Route::get('etudiant-edit/{etudiant}',[EtudiantController::class, 'edit'])->name('etudiant.edit');
Route::put('etudiant-edit/{etudiant}',[EtudiantController::class, 'update'])->name('etudiant.update');
Route::delete('etudiant-edit/{etudiant}',[EtudiantController::class, 'destroy'])->name('etudiant.delete');

Route::get('blog', [BlogPostController::class, 'index'])->name('blog.index')->middleware('auth');
Route::get('blog-create', [BlogPostController::class, 'create'])->name('blog.create')->middleware('auth');
Route::post('blog-create', [BlogPostController::class, 'store'])->name('blog.store')->middleware('auth');
Route::get('blog/{blogPost}', [BlogPostController::class, 'show'])->name('blog.show')->middleware('auth');
Route::get('blog-edit/{blogPost}', [BlogPostController::class, 'edit'])->name('blog.edit')->middleware('auth');
Route::put('blog-edit/{blogPost}', [BlogPostController::class, 'update'])->name('blog.update')->middleware('auth');
Route::delete('blog-edit/{blogPost}', [BlogPostController::class, 'destroy'])->name('blog.delete')->middleware('auth');

Route::get('/documents', [DocumentController::class, 'index'])->name('documents.index')->middleware('auth');
Route::post('/documents', [DocumentController::class, 'store'])->name('documents.store')->middleware('auth');
Route::delete('/documents/{document}', [DocumentController::class, 'destroy'])->name('documents.delete')->middleware('auth');
Route::get('documents/{id}/download', [DocumentController::class, 'download'])->name('documents.download')->middleware('auth');


Route::get('lang/{locale}', [LocalizationController::class, 'index'])->name('lang');
