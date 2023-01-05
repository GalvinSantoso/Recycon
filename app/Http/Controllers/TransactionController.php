<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index(){
        $transactionItems = Transaction::where('user_id', Auth::user()->id)->orderBy('created_at')->get()->groupBy(function($item) {
            return $item->created_at->format('Y-m-d H:i');
       });
        return view('transactionHistory',[
            'transactionItems' => $transactionItems
        ]);
    }

    public function checkOut(Request $request){
        $cartItems = Cart::where('user_id', $request->user_id)->get();
        $validatedData = $request->validate([
            'receiverName' => 'required|min:3',
            'receiverAddress' => 'required'
        ]);
        foreach ($cartItems as $cartItem) {
            Transaction::create([
                'user_id' => $request->user_id,
                'receiverName' => $request->receiverName,
                'receiverAddress' => $request->receiverAddress,
                'quantity' => $cartItem->quantity
            ]);
            TransactionItem::create([
                'transaction_id' => $cartItem->id,
                'item_id' => $cartItem->item[0]->id,
            ]);
            Cart::destroy($cartItem->id);
        }
        return redirect('/showProduct');
    }
}
