<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    function index(){
        $orders = Order::with('customerDetail', 'itemDetail')->orderBy('created_at', 'DESC')->paginate(10);

        return view('Admin.Order.index', compact('orders'));
    }
}
