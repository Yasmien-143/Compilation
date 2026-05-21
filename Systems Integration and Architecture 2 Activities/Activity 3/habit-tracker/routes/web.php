<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HabitController;

// Resource routes for CRUD
Route::resource('habits', HabitController::class);

// DONE button route
Route::get('habits/{habit}/done', [HabitController::class, 'done'])->name('habits.done');