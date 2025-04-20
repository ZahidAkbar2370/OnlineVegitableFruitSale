<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('create-customer', function(){
    return view('Admin.Customer.create');
});

Route::get('customers', function(){
    return view('Admin.Customer.index');
});


Route::get('create-category', function(){
    return view('Admin.Category.create');
});

Route::get('categories', function(){
    return view('Admin.Category.index');
});


Route::get('create-item', function(){
    return view('Admin.Item.create');
});

Route::get('items', function(){
    return view('Admin.Item.index');
});


Route::get('orders', function(){
    return view('Admin.Order.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
