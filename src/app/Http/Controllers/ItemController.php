<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function index(){

        $user_id = Auth::id();
        $items = Item::getSale($user_id)->get();

        return view('index' , compact('items'));
    }
}
