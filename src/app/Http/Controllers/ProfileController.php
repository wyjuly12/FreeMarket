<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function person(){
        return view('mypage');
     }

    public function edit(){
       return view('myprofile');
    }
    
}
