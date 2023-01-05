<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(){
        return view('cartList',[
            'cartItems' => Cart::where('user_id', Auth::user()->id)->get()
        ]
    );
    }

    public function addToCart(Request $request){
        $request->validate([
            'user_id' => 'required',
            'item_id' => 'required',
            'quantity' => 'required|integer|min:1'
        ]);

        $cart = Cart::create([
            'user_id' => $request->user_id,
            'quantity' => $request->quantity
        ]);

        CartItem::create([
            'cart_id' => $cart->id,
            'item_id' => $request->item_id,
        ]);

        return redirect('/showProduct');
    }

    public function deleteCart(Cart $cart){
        Cart::destroy($cart->id);
        return redirect('/cartList')->with('success', 'cart has been deleted!');
    }
    public function updateCart(Cart $cart){
        return view('updateCart',[
            'cart' => $cart
        ]);
    }
    public function update(Request $request){
        $validatedData = $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        Cart::where('id', $request->id)->update($validatedData);

        return redirect('/cartList')->with('success', 'cart has been updated!');
    }


}
