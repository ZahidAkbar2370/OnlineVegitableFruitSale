<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('Frontend.Pages.home');
});

Route::get('shop', function(){
    return view('Frontend.Pages.shop');
});

Route::get('about-us', function(){
    return view('Frontend.Pages.about_us');
});

Route::get('contact-us', function(){
    return view('Frontend.Pages.contact_us');
});

Route::middleware('auth')->group(function(){
    Route::get('profile', function(){
        return view('Frontend.Pages.profile');
    });
        
    // Route::get('create-customer', function(){
    //     return view('Admin.Customer.create');
    // });

    // Route::get('customers', function(){
    //     return view('Admin.Customer.index');
    // });
    Route::get('customers', [App\Http\Controllers\Admin\CustomerController::class, 'index']);
    Route::get('create-customer', [App\Http\Controllers\Admin\CustomerController::class, 'create']);
    Route::post('store-customer', [App\Http\Controllers\Admin\CustomerController::class, 'store']);
    Route::get('edit-customer/{id}', [App\Http\Controllers\Admin\CustomerController::class, 'edit']);
    Route::post('update-customer', [App\Http\Controllers\Admin\CustomerController::class, 'update']);
    Route::get('delete-customer/{id}', [App\Http\Controllers\Admin\CustomerController::class, 'destory']);


    Route::get('categories', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
    Route::get('create-category', [App\Http\Controllers\Admin\CategoryController::class, 'create']);
    Route::post('store-category', [App\Http\Controllers\Admin\CategoryController::class, 'store']);
    Route::get('edit-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);
    Route::post('update-category', [App\Http\Controllers\Admin\CategoryController::class, 'update']);
    Route::get('delete-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'destory']);


    Route::get('orders', [App\Http\Controllers\Admin\OrderController::class, 'index']);


    // Route::get('create-category', function(){
    //     return view('Admin.Category.create');
    // });

    // Route::get('categories', function(){
    //     return view('Admin.Category.index');
    // });


    Route::get('create-item', function(){
        return view('Admin.Item.create');
    });

    Route::get('items', function(){
        return view('Admin.Item.index');
    });


    // Route::get('orders', function(){
    //     return view('Admin.Order.index');
    // });
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
