<?php

namespace App\Http\Controllers;

use App\Models\ShoppingItem;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Auth;

class ShoppingItemController extends Controller
{
    public function index(Request $request)
    {
        // dd($request -> all());
        // fetching data ticket_id,bus_comp_name, bus_comp_id after clicking the buttton
        $ticket_id = $request-> ticket_id;
        $bus_comp_name = $request-> bus_comp_name;
        $bus_comp_id = $request-> bus_comp_id;
        // fetching data ticket_id,bus_comp_name, bus_comp_id after clicking the buttton ends
        $shoppingItems = ShoppingItem::where('ticket_id', $ticket_id)->get();
        // dd($request -> all(), $shoppingItems);
        return view('shopping-items.index', compact('shoppingItems'));
    }

    // Add to cart function:
    // This function will help in adding the showcased items to the shopping cart
    public function addToCart(Request $request)
    {
        $author_id = Auth::user()->id;
        
        //Get the quantities from the form input
        $quantities = $request->input('item_quantity');
        // dd($request -> all(),$quantities);
        //Loop through each quantity and update the cart items accordingly
        foreach ($quantities as $itemId => $quantity) {
            //Check if the quantity is greater than 0 to avoid adding items with zero quantity
            if ($quantity > 0) {
                
                //Find the cart item for the current food item and user
                $cartItem = CartItem::where('user_id', $author_id)
                    ->where('shopping_item_id', $itemId)
                    ->first();

                //If a cart item exists, update the quantity
                if ($cartItem) {
                    $cartItem->quantity = $quantity;
                    $cartItem->save();
                } else {
                    //If a cart item doesn't exist, creating a new one
                    $cartItem = new CartItem();
                    $cartItem->user_id = $author_id;
                    $cartItem->shopping_item_id = $itemId;
                    $cartItem->quantity = $quantity;
                    $cartItem->save();
                }
            }
        }
        
        return redirect()->back()->with('success', 'Cart updated successfully.');
    }

}
