<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Item;
use App\Models\Order;

class CartController extends Controller
{
    public function addToCart($itemID)
    {
        $item = Item::find($itemID);
        $productId = $item->id;
        $productName = $item->item_name;
        $productPrice = $item->sale_price;
        // $productImage = $item->thumbnail;

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += 1;
        } else {
            $cart[$productId] = [
                "item_id" => $productId,
                "name" => $productName,
                "price" => $productPrice,
                // "image" => $productImage,
                "quantity" => 1
            ];
        }

        session()->put('cart', $cart);
        // return response()->json(['status' => 'success', 'message' => 'Product added to cart']);
        return redirect('cart');
    }

    public function removeFromCart(Request $request)
    {
        $id = $request->id;
        $cart = session()->get('cart', []);
        
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart')->with('success', 'Product removed from cart');
    }

    public function viewCart()
    {
        $cart = session()->get('cart', []);
        return view('Frontend.Pages.cart', compact('cart'));
    }

    public function checkout(Request $request)
    {
        $cart = session()->get('cart', []);
        // dd($cart);
        

        if (empty($cart)) {
            return redirect()->back()->with('error', 'Your cart is empty!');
        }

        foreach ($cart as $item) {
            Order::create([
                'customer_id' => auth()->user()->id,   
                'item_id' => $item['item_id'] ?? '0',
                'sale_price' => $item['price'],
                'unit' => $item['quantity'],
                'status' => 'pending',                
            ]);
        }

        session()->forget('cart');

        return redirect('/')->with('success', 'Order placed successfully!');
    }
}
