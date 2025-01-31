<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorize extends Model
{
    use HasFactory;

        protected $fillable = [
            'item_id',
            'category_id'
        ];

        // リレーション(Categorizesテーブル→Itemsテーブル)
        public function items(){
            return $this->belongsTo('App\Models\Item');
        }
        
        // リレーション(Categorizesテーブル→Categoriesテーブル)
        public function Categories(){
            return $this->belongsTo('App\Models\Category');
        }

        //

        public function scopeSeachCategory($query , $item_id){
           $a = $query->where('item_id' ,'=' ,'$item_id');
            dd($a);
        }


          
    
 


}
