<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


class CategoryController extends Controller
{
    function index(){
        $categories = Category::orderBy('created_at', 'DESC')->paginate(10);

        return view('Admin.Category.index', compact('categories'));
    }

    function create(){
        return view('Admin.Category.create');
    }

    public function store(Request $request){
        $path = 'uploads/category/default.png';

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/category'), $filename); // Save in public/uploads/category
            $path = 'uploads/category/' . $filename;
        }

        Category::create([
            "category_name" => $request->category_name,
            "category_thumbnail" => $path,
        ]);

        Session::flash('message', 'Category Created Successfully!');
        return redirect('categories');
    }

    
    function edit($id){
        $category = Category::find($id);

        return view('Admin.Category.edit', compact('category'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
    
        $category = Category::findOrFail($request->id);
    
        $path = $category->category_thumbnail;
    
        if ($request->hasFile('thumbnail')) {
            if ($category->category_thumbnail && file_exists(public_path($category->category_thumbnail)) && $category->category_thumbnail !== 'uploads/category/default.png') {
                unlink(public_path($category->category_thumbnail));
            }
    
            $file = $request->file('thumbnail');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/category'), $filename);
            $path = 'uploads/category/' . $filename;
        }
    
        $category->update([
            'category_name' => $request->category_name,
            'category_thumbnail' => $path,
        ]);
    
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
