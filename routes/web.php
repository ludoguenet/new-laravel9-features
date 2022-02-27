<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('helpers', function () {
    return str('hello')->append(' nord coders')->upper();
});

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/demo', function () {
    return to_route('welcome');
})->name('demo');

Route::controller(OrderController::class)->group(function (){
    Route::post('orders', 'store');
    Route::get('orders/{order}', 'show');
    Route::delete('orders/{order}', 'destroy');
});


