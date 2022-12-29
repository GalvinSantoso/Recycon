<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function showItem(){
        return view('showItem',[
            'items' => Item::paginate(3)
        ]);
    }

    public function itemDetail(Item $item){
        return view('itemDetail',[
            'item' => $item
        ]);
    }

    public function viewItem(){
        return view('viewItem',[
            'items' =>Item::all()
        ]);
    }

    public function updateItem(Item $item){
        return view('updateItem',[
            'item' => $item
        ]);
    }

    public function update(Request $request){
        $rules = [
            'name' => 'required|max:20',
            'price' => 'required|integer|min:1000',
            'description' => 'required|max:200',
            'category' => 'required'
        ];

        $validatedData = $request->validate($rules);

        Item::where('id', $request->id)->update($validatedData);

        return redirect('/viewItem')->with('success', 'Item has been updated!');
    }

    public function deleteItem(Item $item){
        Item::destroy($item->id);
        return redirect('/viewItem')->with('success', 'Item has been deleted!');
    }
}
