<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            'password' => ['required', 'min:6', 'confirmed'],
        ]);

        if(Hash::check($request->oldPassword, auth()->user()->password)){
            $user = Auth::user();

            $user->password = Hash::make($request->password);
            $user->save();
            return back()->with('success', 'Your Password has been updated!');
        }

        throw ValidationException::withMessages([
            'oldPassword' => 'Your current password does not match'
        ]);
    }
}
