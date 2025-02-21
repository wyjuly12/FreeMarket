<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;



use App\Http\Controllers\PostController;


use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\RegisteredUserController;


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


// Route::get('/', function () {
    // return view('welcome');
// });




// ログイン＆会員登録ページ
Route::get('/login' , [AuthController::class, 'login'] )->name('login');
Route::get('/register' , [AuthController::class, 'register'] )->name('register');


// 商品一覧＄商品詳細ページ
Route::get('/', [ItemController::class, 'index'])->name('index');
Route::get('/item/:{item_id}', [ItemController::class, 'detail'])->name('item');
   

// 認証要ページ
Route::middleware('auth')->group(function(){

    Route::get('/mylist', [ItemController::class, 'list'])->name('list');
    Route::post('/purchase/:{item_id}', [ItemController::class, 'postBuy']);
    Route::post('/purchase/address/:{item_id}', [ItemController::class, 'change']);

    Route::get('/sell',[ItemController::class, 'getsell'])->name('getsell');    
    Route::post('/sell', [ItemController::class, 'postSell'])->name('postSell');

    Route::get('/mypage/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::post('/mypage/profile', [ProfileController::class, 'edit'])->name('edit');

    Route::get('/mypage', [ProfileController::class, 'parson'])->name('parson'); 

    Route::get('/mypage/buy', [ProfileController::class, 'searchBuy'])->name('searchBuy');
    Route::get('/mypage/sell', [ProfileController::class, 'searchSell'])->name('searchSell');


    Route::post('/item/:{item_id}', [ItemController::class, 'comment'])->name('comment');
    Route::post('/item/:{item_id}/like', [ItemController::class, 'like'])->name('like');

    Route::get('/purchase/:{item_id}',[ItemController::class, 'purchase'])->name('purchase');
    Route::post('/purchase/:{item_id}',[ItemController::class, 'procedure'])->name('procedure');
  
    Route::get('/purchase/address/:{item_id}',[ProfileController::class, 'address'])->name('address');
    Route::post('/purchase/address/:{item_id}',[ProfileController::class, 'change'])->name('change');
});



