<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

        protected $fillable = [
            'item_id',
            'user_id',
            'comment',
            'create_at'
        ];


        public function items(){
            return $this->belongsTo('App\Models\Item');
        }


        public function users(){
            return $this->belongsTo('App\Models\User');
        }


        public function getUserId(){
            return $this->user_id;
        }

        public function getComment(){
            return $this->comment;
        }


}
