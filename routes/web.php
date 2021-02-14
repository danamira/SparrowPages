<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', [PageController::class, 'Home']);
Route::middleware('auth')->get('/banned', [UserController::class, 'bannedMessage']);
Route::middleware('auth')->middleware('notBanned')->group(function () {
    Route::get('/dashboard', [PageController::class, 'dashboard']);
    Route::get('/profile/new', [ProfileController::class, 'newLinkForm']);
    Route::post('/profile', [ProfileController::class, 'store']);
    Route::get('/profile/{profile}/edit', [ProfileController::class, 'edit']);
    Route::patch('/profile/{profile}', [ProfileController::class, 'update']);
    Route::get('/profile/{profile}/remove', [ProfileController::class, 'remove']);
    Route::delete('/profile/{profile}', [ProfileController::class, 'destroy']);
    Route::get('/account', [UserController::class, 'me']);
});
Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/', [adminController::class, 'dashboard']);
    Route::get('/settings', [SettingController::class, 'edit']);
    Route::post('/settings', [SettingController::class, 'update']);
    Route::get('/users', [UserController::class, 'all']);
    Route::get('/user/{user}', [UserController::class, 'show']);
    Route::get('/stats', [adminController::class, 'stats']);
    Route::get('/skin', [adminController::class, 'skin']);
    Route::post('/skin', [adminController::class, 'updateSkin']);
    Route::post('/upgradeUser', [UserController::class, 'upgrade']);
    Route::post('/deposeUser', [UserController::class, 'depose']);
    Route::post('/user/delete', [UserController::class, 'delete']);
    Route::post('/user/ban', [UserController::class, 'ban']);
    Route::get('/messages', [adminController::class, 'Messages']);
    Route::get('/profiles', [ProfileController::class, 'all']);
    Route::get('/sms', [adminController::class, 'SMS']);
    Route::get('/about', [adminController::class, 'about']);
});
Route::get('/view/{username}', [ProfileController::class, 'show']);
Route::get('/logout', function () {
    auth()->logout();
    return redirect('/');
});
Auth::routes();
Route::get('/contact', [PageController::class, 'contactForm']);
Route::post('/contact', [PageController::class, 'storeMessage']);
Route::get('/test', function () {
    return Storage::url('public/assets/r0upHjYRaNQ6QG8bNS2looi7DXxTFZybOgMlLeOy.png');
});
Route::get('/salam', function () {
    return 'salam';
});
Route::post('account',[UserController::class,'edit']);