<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\ProfileController;
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
Route::group(['middleware' => ['auth']], function(){
    Route::get('/', [PostController::class, 'index'])->name('index');
    Route::post('/posts',  [PostController::class, 'store']);
    Route::get('/posts/create',  [PostController::class, 'create'])->name('create');
    Route::get('/posts/{post}',  [PostController::class, 'show']);
    Route::put('/posts/{post}',  [PostController::class, 'update']);
    Route::delete('/posts/{post}',  [PostController::class, 'delete']);
    Route::get('/posts/{post}/edit',  [PostController::class, 'edit']);
    Route::post('/post/{post}/comments', [PostController::class, 'comment']);
    Route::post('/posts/like', [PostController::class, 'like']);
    Route::post('/posts/unlike', [PostController::class, 'unlike']);
    Route::get('/mypage',  [MypageController::class, 'index'])->name('mypage');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/posts/{post}', [PostController::class ,'show']);

require __DIR__.'/auth.php';
