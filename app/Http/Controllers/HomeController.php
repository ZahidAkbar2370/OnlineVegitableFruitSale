<?php

namespace App\Http\Controllers;

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

        return view('Admin.Dashboard.dashboard');
    }

    public function showItemOnHomePage()
    {
        $items = Item::with('category')->orderBy('created_at', 'DESC')->get();
        
        return view('Frontend.Pages.home', compact('items'));
    }
}
