<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\CommentRequest;
use App\Http\Requests\ExhibitionRequest;
use App\Http\Requests\PurchaseRequest;

use App\Models\User;
use App\Models\Item;
use App\Models\Post;
use App\Models\Favorite;
use App\Models\Person;
use App\Models\Category;
use App\Models\Condition;
use App\Models\Categorize;
use App\Models\Order;


class ItemController extends Controller
{

    // 商品一覧ページ表示
    public function index(Request $request){

        $user_id = Auth::id();
        $user = User::find($user_id);
        $keyword = $request->keyword;
        $items = Item::getSale($user_id)->searchWord($keyword)->get();

        return view('index' , compact('items','user'));
    }

    // マイリスト表示
    public function list(){

        $user_id = Auth::id();
        $user = User::find($user_id);
        $favorites = Favorite::where('user_id',$user_id)->get();

        return view('index', compact('favorites'));
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
            $like = "ture";
        } else {
            $item->favorites()->create(['user_id' => $user_id]);
            $like = "false";
        }
 
        return back()->with(compact('like'));

    }


    // コメント送信機能(商品詳細ページ)

    public function comment(CommentRequest $request){

        $user_id = Auth::id();
        $message = 'コメントを送信しました';

        $form = new Post();
        $form->user_id = $user_id;
        $form->person_id = $user_id;
        $form->item_id = $request->item_id;

        $form->comment = $request->comment;
        $form->save();

        return back()->with(compact('message'));

    }


    // 商品購入ページ表示
    public function purchase($item_id){

        $person = person::where('user_id',Auth::id())->first();
        $item = Item::find($item_id);

        return view('purchase', compact('item','person'));
    }


    //商品購入機能(商品購入ページ)
    public function procedure(PurchaseRequest $request){

        $user_id = Auth::id();
        $message = '商品購入が完了しました';
        
        Order::create([
            'item_id' => $request->item_id,
            'user_id' => $user_id,
            'postcode' => $request->postcode,
            'address' => $request->address, 
            'payment' => $request->payment
        ]);

        Item::where('id',$item_id)->update([
            'buy_flag' => $user_id,
        ]);

        return redirect('/')->with(compact('message'));

    }

    // 商品出品ページ表示
    public function getsell(){
        $conditons = Condition::all();
        $categories = Category::all();
        return view('exhibition' ,compact('categories','conditons'));
    }


    //出品機能(商品出品ページ)
    public function postSell(ExhibitionRequest $request){

        $dir = 'images';
        $file = $request->file('image')->getClientOriginalName();
        $path = 'storage/'.$dir.'/'.$file;
        $message = '商品出品が完了しました';

        $request->session()->flash('imagePath', $path);

        $request->file('image')->storeAs('public/'.$dir , $file);

        $form = new Item();
        $form->goods = $request->goods;
        $form->price = $request->price;
        $form->image =  $path;
        $form->explanation = $request->explanation;
        $form->condition_id = $request->condition_id;
        $form->sell_flag = Auth::id();
        $form->save();

        $item_id = $form->id;
        $categories = $request->category_id;

        foreach($categories as $category){

        $form = new Categorize();
        $form->item_id = $item_id;
        $form->category_id = $category;
        $form->save();

        }
        
        return redirect('/')->with(compact('message'));

    }



    


}
