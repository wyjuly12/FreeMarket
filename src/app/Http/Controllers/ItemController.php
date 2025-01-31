<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use App\Models\Condition;

use App\Models\Categorize;


use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{

    // 商品一覧ページ
    public function index(Request $request){

        $user_id = Auth::id();
        $keyword = $request->keyword;
        $items = Item::getSale($user_id)->searchWord($keyword)->get();

        return view('index' , compact('items'));
    }

    // 商品詳細ページ
    public function detail($item_id){ 
        $item = Item::find($item_id);
        return view('item' , compact('item'));
    }

    // 商品購入ページ
    public function purchase($item_id){
        $item = Item::find($item_id);
        return view('purchase', compact('item'));
    }

    // 商品出品ページ
    public function sell(){
        $conditons = Condition::all();
        $categories = Category::all();
        return view('exhibition' ,compact('categories','conditons'));
    }




}
