<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Hash;

class UserController extends Controller
{
   public function index()
    {
        $users = User::get();
        return view('admin.users.index')->with(['users' => $users]);
    }
    public function user_destroy(Request $request,$id)
    {
        // $user_row = User::find($user_id);
        $user = User::findOrFail($id);
     
      $user->delete();
      return redirect()->route('user')->with(['success' => 'user is deleted successfully !']);
    }
    public function user_add()
    {
        return view('admin.users.create');
    }
    public function user_store(Request $request)
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

        return redirect()->route('user')->with(['success' => 'user created successfully']);
    }
    public function user_edit(Request $request,$id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit')->with(['user' => $user]);
    }
    public function user_update(Request $request,$id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'username' => 'required',
            'email' => 'required|email',
        ]);

        $updatedPassword = $user->password;
        if ($request->password) {
            $updatedPassword = Hash::make($request->password);
        }


        $user->update([
          "username" => $request->username,
          "email" => $request->email,
          "password" => $updatedPassword,
        ]);

        return redirect()->route('user')->with(['success' => 'user updated successfully']);
    }
}
