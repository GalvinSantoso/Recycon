<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UpdateProfileController extends Controller
{
    public function edit(){
        return view('editProfile');
    }

    public function update(Request $request){
        $request->validate([
            'username' => ['string', 'min:3', 'required'],
            'email' => ['email:dns', 'required', 'email', 'unique:users']
        ]);

        auth()->user()->update([
            'name' => $request->username,
            'email' => $request->email
        ]);
        auth()->user()->save();

        return back()->with('success', 'Your Profile has been Updated!');
    }
}
