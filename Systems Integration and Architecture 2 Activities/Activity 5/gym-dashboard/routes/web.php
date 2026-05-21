<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Admin Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/admin-dashboard', function () {
    return view('admin-dashboard');
})->middleware(['auth']);

/*
|--------------------------------------------------------------------------
| User Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/user-dashboard', function () {
    return view('user-dashboard');
})->middleware(['auth']);

/*
|--------------------------------------------------------------------------
| Main Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth']);

/*
|--------------------------------------------------------------------------
| API Route
|--------------------------------------------------------------------------
*/

Route::get('/api/users', [UserController::class, 'index']);

require __DIR__.'/auth.php';