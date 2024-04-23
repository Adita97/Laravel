<?php

use App\Models\Comment;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;


Route::get('/', [ExampleController::class, "index"])->name('home');


Route::get('/comments', [CommentController::class, 'index'])->name('comments.index');
Route::get('/comments/create', [CommentController::class, 'create'])->name('comments.create')->middleware('auth');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store')->middleware('auth');
Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
;

// Route::resource('comments', 'CommentController');



Route::get('/about', function () {
    return view('about-us');
})->name('about');



Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::middleware('auth')->get('/profile', [ProfileController::class, 'showProfile'])->name('profile');
Route::post('/profile', [ProfileController::class, 'updateProfileAvatar'])->name('profile.updateProfileAvatar');
Route::put('/profile/update-username', [ProfileController::class, 'updateUsername'])->name('profile.updateUsername');
Route::put('/profile/update-email', [ProfileController::class, 'updateEmail'])->name('profile.updateEmail');
Route::put('/profile/update-phone-number', [ProfileController::class, 'updatePhoneNumber'])->name('profile.updatePhoneNumber');


Route::get('/uploads', [UploadController::class, 'index'])->name('uploads.index');
Route::post('/uploads/create', [UploadController::class, 'create'])->name('uploads.create');
Route::post('/uploads/store', [UploadController::class, 'store'])->name('uploads.store');