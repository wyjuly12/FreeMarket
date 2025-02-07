<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

        protected $fillable = [
            'item_id',
            'user_id'
        ];

        // 
        public function item(){
            return $this->belongsTo('App\Models\Item');
        }

        // 
        public function pepole(){
            return $this->belongsTo('App\Models\User');
        }



        // 仮↓


        public function getItemId(){
            return $this->item->id;
        }

        public function getItemName(){
            return $this->item->goods;
        }

        public function getItemImage(){
            return $this->item->image;
        }





        




}
