<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;

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


Route::get('/', [ItemController::class, 'index']);
Route::get('/login' , [AuthController::class, 'login'] )->name('login');
Route::get('/register' , [AuthController::class, 'register'] )->name('register');


Route::middleware('auth')->group(function(){
    Route::get('/?tab=mylist', [ItemController::class, 'list']);
    Route::get('/item/:{item_id}', [ItemController::class, 'detail']);
    Route::post('/purchase/:{item_id}', [ItemController::class, 'postBuy']);
    Route::post('/purchase/address/:{item_id}', [ItemController::class, 'change']);
    Route::post('/sell', [ItemController::class, 'postSell']);
    Route::get('/mypage', [ProfileController::class, 'parson']);
    Route::get('/mypage/profile', [ProfileController::class, 'edit']);
    Route::get('/mypage?tab=buy', [ProfileController::class, 'getBuy']);
    Route::get('/mypage?tab=sell', [ProfileController::class, 'getSell']);
});
