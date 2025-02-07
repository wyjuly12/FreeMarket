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

        return view('mypage',compact('user'));
    }

    public function searchBuy(){

        $user_id = Auth::id();
        $items = Item::where('buy_flag',$user_id)->get();

        return view('myprofile',compact('items'));
     
    }

    public function searchSell(){

        $user_id = Auth::id();
        $items = Item::where('sell_flag',$user_id)->get();
        
        return view('myprofile',compact('items'));

    }


    // プロフィール編集ページ表示
    public function profile(Request $request){

        $user_id = Auth::id();
        $user = User::find($user_id);
        $person = Person::find($user_id);
        return view('profile' , compact('user','person'));
  
    }




    // プロフィール編集機能
    public function edit(AddressRequest $request){

        $dir = 'photos';
        $user_id = Auth::id();

        // $file = $request->file('photo')->getClientOriginalName();
        $file = 'UserNo.'.$user_id;
        $request->file('photo')->storeAs('public/'.$dir , $file);

        $user = Person::where('user_id',$user_id)->first();

        if($user !== null ){
            Person::where('user_id',$user_id)->delete();
        }


        $form = new person();
        $form->user_id = Auth::id();
        $form->postcode = $request->postcode;
        $form->address = $request->address;
        $form->building = $request->building;
        $form->photo =  'storage/'.$dir.'/'.$file;
        $form->save();

        $form = $request->all();
        unset($form['_token']);
        user::find($user_id)->update($form);
        
        return redirect('/');

    }


    // 住所変更ページ表示
    public function address($item_id){

        $person = Person::where("user_id", Auth::id());
        $item = Item::find($item_id);
        return view('address' ,compact('person','item'));
    }

    // 配送先変更
    public function change(Request  $request , $item_id){

        $user_id = Auth::id();

        $person = Person::where("user_id", $user_id)->first();
        $item = Item::find($item_id);

        $form = $request->all();
        unset($form['_token']);
        person::where("user_id", $user_id)->update($form);

        return redirect()->route('purchase',[$item]);
        
    }



}
