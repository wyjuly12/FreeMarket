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

    public function store(){
        $form = $request->all();
        Person::create($form);
        return redirect('/');
    }


        // 
    public function edit($item_id){
        $item = Item::find($item_id);
        return view('address', compact('item')); 
    }




}
