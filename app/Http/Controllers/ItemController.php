<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    public function showItem(){
        return view('showItem',[
            'items' => Item::search()->paginate(3),
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

    public function addItem(){
        return view('addItem');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'id' => 'required|unique:items',
            'name' => 'required|unique:items|max:20',
            'price' => 'required|integer|min:1000',
            'description' => 'required|max:200',
            'image' => 'required|image',
            'category' => 'required'
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('/');
        }

        Item::create($validatedData);

        return redirect('/viewItem')->with('success', 'Item has been added!');
    }

    public function update(Request $request){
        $rules = [
            'name' => 'required|unique:items|max:20',
            'price' => 'required|integer|min:1000',
            'description' => 'required|max:200',
            'image' => 'required|image',
            'category' => 'required'
        ];

        $validatedData = $request->validate($rules);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('/');
        }

        Item::where('id', $request->id)->update($validatedData);

        return redirect('/viewItem')->with('success', 'Item has been updated!');
    }

    public function deleteItem(Item $item){
        if($item->image){
            Storage::delete($item->image);
        }
        Item::destroy($item->id);
        return redirect('/viewItem')->with('success', 'Item has been deleted!');
    }
}
