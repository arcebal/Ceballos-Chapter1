<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

// Home page
Route::get('/', function () {
    return view('home'); // ✅ uses resources/views/home.blade.php
});

// Job routes (all 7 CRUD routes in 1 line)
Route::resource('jobs', JobController::class);
