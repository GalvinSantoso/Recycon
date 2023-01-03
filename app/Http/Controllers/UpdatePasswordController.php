<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UpdatePasswordController extends Controller
{
    public function edit(){
        return view ('changePassword');
    }

    public function update(Request $request){
        $request->validate([
            'oldPassword' => ['required'],
            'newPassword' => ['required', 'min:6', 'confirmed'],

        ]);

        if(Hash::check($request->oldPassword, auth()->user()->password)){
            auth()->user()->update('newPassword', Hash::make($request->newPassword));
            return back()->with('message', 'Your Password has been updated!');
        }

        throw ValidationException::withMessages([
            'oldPassword' => 'Your current password does not match'
        ]);
    }
}
