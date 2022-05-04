<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Auth;
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
}
