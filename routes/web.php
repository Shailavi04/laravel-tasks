<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

// ✅ Home Page and User Page
Route::get('/', [HomeController::class, 'index']);
Route::get('/users/{name}', [HomeController::class, 'user']);

// ✅ Sluggable + Translatable
Route::get('/posts/create', [PostController::class, 'create']);
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts', [PostController::class, 'index']);

// ✅ Excel Export/Import
Route::get('/export-users', [UserController::class, 'export']);
Route::get('/import-users', [UserController::class, 'showImportForm']);
Route::post('/import-users', [UserController::class, 'import']);


use App\Http\Controllers\ContactController;

Route::get('/contact', [ContactController::class, 'show']);
Route::post('/contact', [ContactController::class, 'submit']);

use App\Jobs\WelcomeLogJob;

Route::get('/test-job', function () {
    WelcomeLogJob::dispatch();
    return '✅ Job dispatched!';
});
