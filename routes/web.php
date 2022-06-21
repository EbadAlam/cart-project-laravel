<?php


use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[FrontendController::class,'index'])->name('home');
Route::get('/login',[FrontendController::class,'login'])->name('login');
Route::post('/login',[FrontendController::class,'login_post'])->name('login_post');
Route::get('/logout',[FrontendController::class,'logout'])->name('logout');
Route::get('/register',[FrontendController::class,'register'])->name('register');
Route::post('/register',[FrontendController::class,'register_post'])->name('register_post');

Route::group(['prefix' => 'admin','middleware' => ['AuthCheck']], function() {
	Route::get('/dashboard',[AdminController::class,'index'])->name('dashboard');

	Route::get('/user',[UserController::class,'index'])->name('user');
	Route::get('/user/user_add',[UserController::class,'user_add'])->name('user_add');
	Route::post('/user/user_store',[UserController::class,'user_store'])->name('user_store');
	Route::delete('/user/user_delete/{id}',[UserController::class,'user_destroy'])->name('user_destroy');
	Route::get('/user/user_edit/{id}',[UserController::class,'user_edit'])->name('user_edit');
	Route::put('/user/user_edit/{id}',[UserController::class,'user_update'])->name('user_update');

	Route::get('/item',[ItemController::class,'index'])->name('item');
	Route::get('/item_add',[ItemController::class,'item_add'])->name('item_add');
	Route::post('/item_add',[ItemController::class,'item_post'])->name('item_post');
	Route::delete('/item_destroy/{id}',[ItemController::class,'destroy'])->name('item_destroy');
	Route::get('/item_edit/{id}',[ItemController::class,'item_edit'])->name('item_edit');
	Route::put('/item_edit/{id}',[ItemController::class,'item_update'])->name('item_update');
	
});
