<?php

use App\Enums\Order\OrderStatus;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Blade;
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

Route::get('/users/{user}/orders/{order}', function (User $user, Order $order) {
    dd($user, $order);
})->scopeBindings();

Route::get('/', function () {

    $order = Order::first();

    $order->status = OrderStatus::Success;
    $order->save();

    if ($order->status === OrderStatus::Success) {
        return 'Success';
    }

    return 'Not Success';

    // return Blade::render('Hello {{ $username }} <br>
    // @if ($username === "Nord Coders") coucou @endif', [
    //     'username' => 'Nord Coders1'
    // ]);
});

Route::controller(OrderController::class)->group(function (){
    Route::post('orders', 'store');
    Route::get('orders/{order}', 'show');
    Route::delete('orders/{order}', 'destroy');
});


