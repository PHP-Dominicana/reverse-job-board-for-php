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
use App\Http\Controllers;

Route::get('/', Controllers\HomeController::class)->name('home.index');

Route::get('/developers', function () {
    return view('pages.developers');
})->name('developers.index');

Route::get('/developers/{developer}', Controllers\Developers\DetailController::class)->name('developers.detail');

Route::get('/user/developers', function () {
    return view('pages.developers');
})->name('developers.create');

Route::get('/jobs', function () {
    return view('pages.jobs');
})->name('jobs.index');

Route::get('/about', function () {
    return view('pages.about');
})->name('about.index');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/developers/hire/{developer}', Controllers\Developers\HireController::class)->name('developers.hire');
});
