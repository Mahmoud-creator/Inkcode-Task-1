<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SessionController;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function (){

    $orders = Order::latest();

    if(request('search')){
        $orders
            ->where('order_name','like','%'.\request('search').'%')
            ->orWhere('id','like',\request('search'))
        ;
    }

    return view('dashboard',[
        'orders' => $orders->get()
    ]);

})->middleware('auth')->name('dashboard');

Route::get('/login',[AdminController::class, 'create'])->middleware('guest')->name('login');
Route::post('/login',[AdminController::class, 'store'])->middleware('guest')->name('login');

Route::get('/create_order',[OrderController::class, 'create'])->middleware('auth')->name('create_order');
Route::post('/create_order',[OrderController::class, 'store'])->middleware('auth')->name('create_order');

Route::get('/edit_order/{order}',[OrderController::class, 'edit'])->middleware('auth')->name('edit_order');
Route::patch('/edit_order/{order}',[OrderController::class, 'update'])->middleware('auth')->name('update_order');
Route::delete('/delete_order/{order}',[OrderController::class, 'destroy'])->middleware('auth')->name('update_order');

Route::get('/export_orders', [OrderController::class, 'export'])->middleware('auth')->name('export_order');
