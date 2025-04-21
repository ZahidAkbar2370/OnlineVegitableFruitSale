<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;


class ItemController extends Controller
{
    public function index()
    {
        $items = Item::with('category')->orderBy('created_at', 'DESC')->get();

        return view('Admin.Item.index', compact('items'));
    }


    public function create(){
        $categories = Category::where('publication_status', 'active')->get();
        
        return view('Admin.Item.create', compact('categories'));
    }

    public function store(Request $request){
        $request->validate([
            'category' => 'required|exists:categories,id',
            'title' => 'required|string',
            'sale_price' => 'required|numeric',
            'uni' => 'required|string',
            'description' => 'required|string',
        ]);

        $slug = Str::slug($request->title);

        Item::create([
            'category_id' => $request->category,
            'item_name' => $request->title,
            'sale_price' => $request->sale_price,
            'unit' => $request->uni,
            'description' => $request->description,
            'slug' => $slug,
        ]);

        Session::flash('message', 'Item created successfully.');
        return redirect('items');
    }


    public function edit($id)
    {
        $categories = Category::where('publication_status', 'active')->get();
        $item = Item::findOrFail($id);
    
        return view('Admin.Item.edit', compact('categories', 'item'));
    }
    
    public function update(Request $request)
{
    $request->validate([
        'category' => 'required|exists:categories,id',
        'title' => 'required|string',
        'sale_price' => 'required|numeric',
        'uni' => 'required|string',
        'description' => 'required|string',
    ]);

    // Get the item ID from the hidden field in the form
    $item_id = $request->item_id;

    // Find the item by ID
    $item = Item::findOrFail($item_id);

    // Update the item with the new data
    $slug = Str::slug($request->title);

    $item->update([
        'category_id' => $request->category,
        'item_name' => $request->title,
        'sale_price' => $request->sale_price,
        'unit' => $request->uni,
        'description' => $request->description,
        'slug' => $slug,
    ]);

    Session::flash('message', 'Item updated successfully.');
    return redirect('items');
}


    function destory($id){
        $item = Item::find($id);

        $item->delete();

        Session::flash('message', 'Item Deleted Successfully!');
        return redirect('items');
    }
}
