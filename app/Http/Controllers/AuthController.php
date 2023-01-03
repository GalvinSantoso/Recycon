<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginIndex(){
        return view('login',[
        "user_role"=>"guest"]);
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
             ]);

        if($request->remember){
            Cookie::queue('emailCookie', $request->email, 60);
            Cookie::queue('passwordCookie', $request->password, 60);
        }

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('loginError', 'Login Failed');
    }

    public function logout(){
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/login');
    }


    public function registerIndex(){
        return view('register',[
            "user_role"=>"guest"
        ]);
    }
    public function register(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email:dns|unique:users',
            'password'=>'required|min:6|confirmed',
            'password_confirmation' =>'required|min:6'
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['user_role_id'] = 1;
        User::create($validatedData);
        return redirect('/login')->with('success','Registration success');
    }
}
