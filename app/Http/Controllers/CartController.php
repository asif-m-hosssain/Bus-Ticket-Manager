<?php


// CartController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use Auth;

// to show tickets need this
use Carbon\Carbon;
use App\Models\CustomerBuyTicket;
// to show tickets need this ends 

class CartController extends Controller
{
    //This function will help in fetching the items ordered by the 
    //assciated logged in user 
    public function cart()
    {
        //Get the authenticated user's ID
        $userId = Auth::id();
        
        //Fetch cart items for the authenticated logged in  user
        $cartItems = CartItem::where('user_id', $userId)->get();

        //Empty array initialization to store the cart items details and info
        $detailedCartItems = [];

        //Looping through each cart item and fetching the associated shopping item info 
        foreach ($cartItems as $cartItem) {
            $shoppingItem = $cartItem->shoppingItem;

            //Array creation with the cart item info
            $detailedCartItem = [
                'name' => $shoppingItem->name,
                'price' => $shoppingItem->price,
                'quantity' => $cartItem->quantity,
                'total' => $shoppingItem->price * $cartItem->quantity,
            ];

            //Add the detailed cart item to the array
            $detailedCartItems[] = $detailedCartItem;
        }

        // ticket details
        $tickets = CustomerBuyTicket::where('customer_id', $userId)->get();
        // dd($tickets);
        // ticket details ends
        

        //Pass the detailed cart items to the cart view
        return view('shopping-items.cart', compact('detailedCartItems','tickets'));
    }
}

