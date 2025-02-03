<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Item;
use App\Models\Post;
use App\Models\Person;
use App\Models\Category;
use App\Models\Condition;
use App\Http\Requests\CommentRequest;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{

    // 商品一覧ページ表示
    public function index(Request $request){

        $user_id = Auth::id();
        $keyword = $request->keyword;
        $items = Item::getSale($user_id)->searchWord($keyword)->get();

        return view('index' , compact('items'));
    }

    // 商品詳細ページ表示
    public function detail($item_id){ 
  
        $categories = category::all();
        $item = Item::find($item_id);

        return view('item' , compact('item','categories'));
    }

    // コメント送信機能(詳細画面)
    public function comment(CommentRequest $request){

        $categories = category::all();
        $item = Item::find($request->item_id);

        $form = new Post();
        $form->person_id = Auth::id();
        $form->item_id = $request->item_id;
        $form->comment = $request->comment;
        $form->save();
        return view('item' , compact('item','categories'));
    }

    // 商品購入ページ表示
    public function purchase($item_id){

        $person = person::find(Auth::id());
        $item = Item::find($item_id);
        return view('purchase', compact('item','person'));
    }

    // 商品出品ページ表示
    public function getsell(){
        $conditons = Condition::all();
        $categories = Category::all();
        return view('exhibition' ,compact('categories','conditons'));
    }



    //出品機能(商品出品ページ)
    public function postSell(Request $request){

        $item = Item::find($request->item_id);

        $dir = 'images';
     
    
        $form = new Item();
        $form->goods = $goods->price;
        $form->price = $request->price;
        $form->image = 
        $form->explanation = $request->condition;
        $form->condition_id = $request->condition;
        $form->sell_flag = Auth::id();

        return redirect('/');

    }



    


}
