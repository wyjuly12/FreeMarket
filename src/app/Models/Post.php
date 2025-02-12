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


        public function item(){
            return $this->belongsTo('App\Models\Item');
        }

        public function user(){
            return $this->belongsTo('App\Models\User');
        }

        public function getUserName(){
            return $this->user->name;
        }

        public function getComment(){
            return $this->comment;
        }






}
