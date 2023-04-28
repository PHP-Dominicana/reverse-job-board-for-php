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

Route::get('/', \App\Http\Controllers\HomeController::class);

Route::get('/developers', function () {
    return view('pages.developers');
});

Route::get('/user/developers', function () {
    return view('pages.developers');
})->name('developers.create');

Route::get('/jobs', function () {
    return view('pages.jobs');
});

Route::get('/about', function () {
    return view('pages.about');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
