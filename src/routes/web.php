<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;

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
Route::get('/', [ItemController::class, 'index']);
Route::get('/item/:{item_id}', [ItemController::class, 'detail']);
   

// 認証要ページ
Route::middleware('auth')->group(function(){

    Route::get('/?tab=mylist', [ItemController::class, 'list']);
    Route::post('/purchase/:{item_id}', [ItemController::class, 'postBuy']);
    Route::post('/purchase/address/:{item_id}', [ItemController::class, 'change']);
    Route::get('/sell',[ItemController::class, 'getsell']);    
    Route::post('/sell', [ItemController::class, 'postSell']);


    Route::get('/mypage', [ProfileController::class, 'parson']);
    Route::get('/mypage/profile', [ProfileController::class, 'profile']);
    Route::get('/mypage?tab=buy', [ProfileController::class, 'searchBuy']);
    Route::get('/mypage?tab=sell', [ProfileController::class, 'searchSell']);



    Route::post('/item/:{item_id}', [ItemController::class, 'comment']);

    Route::get('/purchase/:{item_id}',[ItemController::class, 'purchase']);
  


    Route::get('/purchase/address/:{item_id}',[ProfileController::class, 'edit']);

});



