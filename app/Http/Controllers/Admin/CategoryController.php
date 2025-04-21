<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    function index(){
        $categories = Category::orderBy('created_at', 'DESC')->paginate(10);

        return view('Admin.Category.index', compact('categories'));
    }

    function create(){
        return view('Admin.Category.create');
    }

    function store(Request $request){
        Category::create([
            "category_name" => $request->category_name,
        ]);

        Session::flash('message', 'Category Created Successfully!');
        return redirect('categories');
    }

    function edit($id){
        $category = Category::find($id);

        return view('Admin.Category.edit', compact('category'));
    }

    function update(Request $request){
        $category = Category::find($request->id);

        $category->category_name = $request->category_name;
        $category->update();

        Session::flash('message', 'Category Updated Successfully!');
        return redirect('categories');
    }

    function destory($id){
        $category = Category::find($id);

        $category->delete();

        Session::flash('message', 'Category Deleted Successfully!');
        return redirect('categories');
    }
}
