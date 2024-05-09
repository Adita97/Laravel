<?php

use App\Models\Comment;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MyBookingsController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\EmailSubscribersController;


Route::get('/', [HomeController::class, "index"])->name('home');

Route::post('/subscribe', [EmailSubscribersController::class, 'subscribe'])->name('email.subscribe');

Route::get('/comments', [CommentController::class, 'index'])->name('comments.index');
Route::get('/comments/create', [CommentController::class, 'create'])->name('comments.create')->middleware('auth');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store')->middleware('auth');
Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
;




Route::get('/about', function () {
    return view('about-us');
})->name('about');


Route::group(['middleware' => 'guest'], function () {
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);


Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


    Route::get('/password/reset-form', [PasswordResetController::class, 'showResetForm'])->name('password.resetForm');
    Route::post('/password/email', [PasswordResetController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/reset-password/{token}', [PasswordResetController::class, 'showPasswordResetForm'])->name('password.reset');
    Route::post('/reset-password', [PasswordResetController::class, 'reset'])->name('password.update');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' =>'auth'], function() {
    Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile');
    Route::post('/profile/update-avatar', [ProfileController::class, 'updateAvatar'])->name('profile.updateAvatar');

    Route::put('/profile/update-username', [ProfileController::class, 'updateUsername'])->name('profile.updateUsername');
    Route::put('/profile/update-email', [ProfileController::class, 'updateEmail'])->name('profile.updateEmail');
    Route::put('/profile/update-phone-number', [ProfileController::class, 'updatePhoneNumber'])->name('profile.updatePhoneNumber');
    Route::put('/profile/update-bio', [ProfileController::class, 'updateBio'])->name('profile.updateBio');
    Route::put('/profile/update-links', [ProfileController::class, 'updateLinks'])->name('profile.updateLinks');

    Route::post('/profile/update-skills', [ProfileController::class, 'updateSkills'])->name('profile.updateSkills');
    Route::delete('/profile/delete-skills/{id}', [ProfileController::class, 'deleteSkill'])->name('profile.deleteSkills');


    Route::get('/book-photo-session', [BookingController::class, 'index'])->name('booking');
    Route::post('/book-photo-session', [BookingController::class, 'store'])->name('booking.store');

    Route::get('/my-bookings', [MyBookingsController::class, 'showBookings'])->name('my-bookings');
    Route::post('/cancel-booking', [MyBookingsController::class, 'cancelBooking'])->name('cancel-booking');
    Route::post('/change-date', [MyBookingsController::class, 'changeDate'])->name('change-date');
});
Route::get('/contact', [ContactController::class, 'showContactForm'])->name('contact-form');
Route::post('/contact', [ContactController::class,'store'])->name('contact.store');


Route::get('/gallery', [GalleryController::class, 'show'])->name('gallery');


Route::get('locale/{lang}', [LocaleController::class,'setLocale']);