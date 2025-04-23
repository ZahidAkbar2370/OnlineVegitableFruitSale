<?php
use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $items = Item::with('category')->orderBy('created_at', 'DESC')->get();
    
    return view('Frontend.Pages.home', compact('items'));
});

Route::get('shop', function(){
    $items = Item::with('category')->orderBy('created_at', 'DESC')->get();

    return view('Frontend.Pages.shop', compact('items'));
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

    Route::post('update-profile', function(Request $request){
        $user = User::find(Auth::user()->id);

        $user->name = $request->name;
        $user->mobile_no = $request->mobile_no;
        $user->update();
        
        return redirect('profile');
    });

    Route::get('logout', function(){
        Auth::logout();

        return redirect('login');
    });


    Route::get('add-to-cart/{itemID}', [App\Http\Controllers\CartController::class, 'addToCart']);
    Route::get('cart', [App\Http\Controllers\CartController::class, 'viewCart']);
    Route::post('cart-remove/{id}', [App\Http\Controllers\CartController::class, 'removeFromCart']);
    Route::post('checkout', [App\Http\Controllers\CartController::class, 'checkout']);
        
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

    
    Route::get('items', [App\Http\Controllers\Admin\ItemController::class, 'index']);
    Route::get('create-item', [App\Http\Controllers\Admin\ItemController::class, 'create']);
    Route::post('store-item', [App\Http\Controllers\Admin\ItemController::class, 'store']);
    Route::get('edit-item/{id}', [App\Http\Controllers\Admin\ItemController::class, 'edit']);
    Route::post('update-item', [App\Http\Controllers\Admin\ItemController::class, 'update']);
    Route::get('delete-item/{id}', [App\Http\Controllers\Admin\ItemController::class, 'destory']);



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


    // Route::get('create-item', function(){
    //     return view('Admin.Item.create');
    // });

    // Route::get('items', function(){
    //     return view('Admin.Item.index');
    // });


    // Route::get('orders', function(){
    //     return view('Admin.Order.index');
    // });
});



Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




