<?php

namespace App\Http\Controllers;

use App\Models\ShoppingItem;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Auth;

class ShoppingItemController extends Controller
{
    public function index()
    {
        $shoppingItems = ShoppingItem::all();

        return view('shopping-items.index', compact('shoppingItems'));
    }

    public function addToCart(request $req)
    {
        dd($req -> all(),"doesit work?");
        
        $author_id = Auth::user()->id;
        $data = new CartItem;
        $data -> shopping_item_id = $req->input("food_id");
        $data-> user_id =$author_id;
        $data-> quantity = $req->input("item_quantity");
        $data -> save();
        return redirect()->back();
        // $user = Auth::user();
    
        // // Attach the shopping item to the user's cart with quantity 1
        // $user->cartItems()->attach($shoppingItem, ['quantity' => 1]);

        // return redirect()->back()->with('success', 'Item added to cart successfully.');
    }
    
    public function removeFromCart(ShoppingItem $shoppingItem)
    {
        $user = Auth::user();
        
        // Detach the shopping item from the user's cart
        $user->cartItems()->detach($shoppingItem);

        return redirect()->back()->with('success', 'Item removed from cart successfully.');
    }

    
}

