<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $item = Item::get();
    	return view('home')->with(['item' => $item]);
    }
    public function login()
    {
        return view('login');
    }
    public function login_post(Request $request)
    {
        // dd($request->all());
        $request->validate([
            "username"=>'required',
            "password"=>'required',
        ]);
        $credentials = $request->only('username','password');
        $login = Auth::attempt($credentials);
        if ($login) {
            // dd('Logined');
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->with(['error'=>'Something is wrong']);
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
    public function register()
    {
        return view('register');
    }
    public function register_post(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'email' => 'required|email',
        ]);
        User::create([
          "username" => $request->username,
          "email" => $request->email,
          "password" => Hash::make($request->password),
        ]);

        return redirect()->route('home');
    }
}
