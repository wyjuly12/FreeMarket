<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentRequest;

use App\Models\User;
use App\Models\Item;
use App\Models\Post;

use App\Models\Favorite;
use App\Models\Person;
use App\Models\Category;
use App\Models\Condition;



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
  
        $categories = Category::all();
        $item = Item::find($item_id);

        return view('item' , compact('item','categories'));
    }

    // マイリスト機能(詳細ページ)
    public function like(Request $request){

        $item = Item::find($request->item_id);
        $item_id = $request->item_id;
        $user_id = Auth::id();
    
        $isLiked = $item->favorites()->where('user_id', $user_id)->exists();

        if ($isLiked) {
            $item->favorites()->where('user_id', $user_id )->delete();
        } else {
            $item->favorites()->create(['user_id' => $user_id]);
        }
 
        return back();

    }


    // コメント送信機能(商品詳細ページ)
    public function comment(CommentRequest $request){

        $form = new Post();
        $form->user_id = Auth::id();
        $form->item_id = $request->item_id;
        $form->comment = $request->comment;
        $form->save();

        return back();

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
