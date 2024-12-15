<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Models\Category;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard', [
        "categories" => Category::all()
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Category
Route::get('category-fetch', [CategoryController::class, 'fetchAll'])->name('category.all');
Route::get('category-single/{category}', [CategoryController::class, 'getSingle'])->name('category.get-single');

// Post 
Route::resource('post', PostController::class);

// Comment
Route::resource('comment', CommentController::class);

require __DIR__.'/auth.php';
