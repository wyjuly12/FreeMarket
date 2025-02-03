<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Person;


class ProfileController extends Controller
{
    public function parson(){

        $user_id = Auth::user();
        $person = Person::all();
        
        return view('mypage',compact('person','user_id'));
     }

    public function profile(){

        $user_id = Auth::user();
        return view('profile' , compact('user_id'));
    }


    // 住所変更ページ表示
    public function address(){

        return view('address');
    }

    // 配送先変更
    public function change(Request $request){
        
        $form = person::find(Auth::id());  
        
        $form = new person();
        $form->user_id = Auth::user();
        $form->postcode = $request->postcode;
        $form->address = $request->address;
        $form->building = $request->building;
        $form->photo = $person->photo;
        $form->save();

        return redirect('/');
    }



}
