<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\AddressRequest;


use App\Models\Person;
use App\Models\Item;
use App\Models\User;
use App\Models\Favorite;




class ProfileController extends Controller
{

    // プロフィール一覧ページ表示
    public function parson(){

        $user_id = Auth::id();
        $user = User::find($user_id);
        $person = Person::where('user_id',$user_id)->first();

        return view('mypage',compact('user','person'));
    }

    public function searchBuy(){

        $user_id = Auth::id();
        $user = User::find($user_id);
        $items = Item::where('buy_flag',$user_id)->get();
        $person = Person::where('user_id',$user_id)->first();
        
        return view('mypage',compact('items','person','user'));
     
    }

    public function searchSell(){

        $user_id = Auth::id();
        $user = User::find($user_id);
        $items = Item::where('sell_flag',$user_id)->get();
        $person = Person::where('user_id',$user_id)->first();
        
        return view('mypage',compact('items','person','user'));

    }


    // プロフィール編集ページ表示
    public function profile(){

        $user_id = Auth::id();
        $user = User::find($user_id);
        $person = Person::where('user_id',$user_id)->first();
        return view('profile' , compact('user','person'));
   
    }


    // プロフィール編集機能
    public function edit(AddressRequest $request){

        $user_id = Auth::id();
        $dir = 'photos';
        $file = 'user'.$user_id.'.jpg';
        $message = "プロフィールを更新しました";

        if($request->photo !== null ){
            $request->file('photo')->storeAs('public/'.$dir , $file);
        }

        $user = Person::where('user_id',$user_id)->first();

        if($user !== null ){
            Person::where('user_id',$user_id)->update(
                [
                 'postcode' => $request->postcode,
                 'address' => $request->address,
                 'building' => $request->building,
                 'photo' =>  'storage/'.$dir.'/'.$file
                 ]
                );
            User::where('id',$user_id)->update(
               ['name' => $request->name] 
            );
        }
        
        if($user == null){
            person::create(
                [
                'user_id' => Auth::id(),
                'postcode' => $request->postcode,
                'address' => $request->address,
                'building' => $request->building,
                'photo' =>  'storage/'.$dir.'/'.$file,
                ]
            );

            User::where('id',$user_id)->update(
                [
                'name' => $request->name
                ] 
            );
        }

        return redirect('/')->with(compact('message'));

    }

    // 住所変更ページ表示
    public function address($item_id){

        $user_id = Auth::id();
        $person = Person::where("user_id", $user_id);
        $item = Item::find($item_id);
        
        return view('address' ,compact('person','item'));
    }

    // 配送先変更
    public function change(AddressRequest $request,$item_id){

        $user_id = Auth::id();
        $person = Person::where("user_id", $user_id)->first();
        $message = '配送先を更新しました';

        person::where("user_id", $user_id)->update(
            [
            'postcode' => $request->postcode,
            'address' => $request->address,
            'building' => $request->building
            ]
            );

            return redirect()->route('purchase',compact('item_id'))->with(compact('message'));
    }



}
