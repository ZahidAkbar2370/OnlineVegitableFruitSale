<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    function index(){
        $customers = User::where('role', 'customer')->orderBy('created_at', 'DESC')->paginate(10);

        return view('Admin.Customer.index', compact('customers'));
    }

    function create(){
        return view('Admin.Customer.create');
    }

    function store(Request $request){
        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "mobile_no" => $request->mobile_no,
            "password" => Hash::make($request->password),
        ]);

        Session::flash('message', 'Customer Created Successfully!');
        return redirect('customers');
    }

    function edit($id){
        $customer = User::find($id);

        return view('Admin.Customer.edit', compact('customer'));
    }

    function update(Request $request){
        $customer = User::find($request->id);

        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->mobile_no = $request->mobile_no;

        if(isset($customer->password) && !empty($customer->password)){
            $customer->password = Hash::make($request->password);
        }

        $customer->update();

        Session::flash('message', 'Customer Updated Successfully!');
        return redirect('customers');
    }

    function destory($id){
        $customer = User::find($id);

        $customer->delete();

        Session::flash('message', 'Customer Deleted Successfully!');
        return redirect('customers');
    }
}
