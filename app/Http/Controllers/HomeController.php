<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role == 'customer'){
            return redirect('profile');
        }

        $customerCount = User::where('role', 'customer')->count();
        $orderCount = Order::count();
        $itemCount = Item::count();
        $categoryCount = Category::count();

        return view('Admin.Dashboard.dashboard', compact('customerCount', 'orderCount', 'itemCount', 'categoryCount'));
    }

    public function showItemOnHomePage()
    {
        $items = Item::with('category')->orderBy('created_at', 'DESC')->get();
        
        return view('Frontend.Pages.home', compact('items'));
    }
}
