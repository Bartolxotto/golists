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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/categories', App\Livewire\ShowCategories::class)->name('categories');
    Route::get('/products', App\Livewire\Product\ShowProduct::class)->name('products');

    Route::get('/lists', function () {
        return view('lists');
    })->name('lists');

});
