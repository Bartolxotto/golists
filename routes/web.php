<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/lists', function () {
    return view('lists');
})->middleware(['auth', 'verified'])->name('lists');

Route::get('/categories', function () {
    return view('categories');
})->middleware(['auth', 'verified'])->name('categories');

/*Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/lists', function () {
        return view('lists');
    })->name('dashboard');
});*/
