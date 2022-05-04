<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
       $user_count = User::get()->count();
       $item_count = Item::get()->count();
       return view('admin.dashboard',compact('user_count','item_count'));
    }
}
