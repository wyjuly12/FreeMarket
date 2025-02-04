<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Item;
use App\Models\Category;


class FavoriteController extends Controller
{
    public function like(Request $request){

        $users = Auth::user();
        $item = Item::find($request->item_id);
        $categories = category::all();  
        
        
    }
}
