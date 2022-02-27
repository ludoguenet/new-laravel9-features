<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Blade;

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

Route::get('/', function () {
    return Blade::render('Hello {{ $username }} <br>
    @if ($username === "Nord Coders") coucou @endif', [
        'username' => 'Nord Coders1'
    ]);
});

Route::controller(OrderController::class)->group(function (){
    Route::post('orders', 'store');
    Route::get('orders/{order}', 'show');
    Route::delete('orders/{order}', 'destroy');
});


