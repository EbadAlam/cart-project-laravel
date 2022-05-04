<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
    	$item = Item::get();
    	return view('admin.item.index')->with(['item' => $item]);
    }
    public function item_add()
    {
    	return view('admin.item.create');
    }
    public function iteM_post(Request $request)
    {
    	$request->validate([
    		'name' => 'required',
    		'price' => 'required',
    		'image' => 'required',
    	]);
    	$imageName = null;

        if ($request->image) {
            $imageName = "item_images/" .time().'.'.$request->image->extension();  
            $request->image->move(public_path('item_images'), $imageName);
        }
    	Item::create([
    		'name' => $request->name,
    		'price' => $request->price,
    		'image' => $imageName,
    	]);
    	return redirect()->route('item')->with(['success' => 'Item added successfully!']);
    }
    public function destroy(Request $request,$id)
    {
    	$item = Item::findOrFail($id);
    	unlink($item->image);
    	$item->delete();
    	return redirect()->route('item')->with(['success' => 'Item deleted successfully!']);
    }
    public function item_edit(Request $request,$id)
    {
    	$item = Item::findOrFail($id);
    	return view('admin.item.edit')->with(['item' => $item]);
    }
    public function item_update(Request $request,$id)
    {
    	$item = Item::findOrFail($id);
    	$request->validate([
    		'name' => 'required',
    		'price' => 'required',
    		'image' => 'required',
    	]);
    	$imageName = $item->image;

        if ($request->image) {
        	unlink($item->image);
            $imageName = "item_images/" .time().'.'.$request->image->extension();  
            $request->image->move(public_path('item_images'), $imageName);
        }
    	$item->update([
    		'name' => $request->name,
    		'price' => $request->price,
    		'image' => $imageName,
    	]);
    	return redirect()->route('item')->with(['success' => 'Item updated successfully!']);
    }
}
