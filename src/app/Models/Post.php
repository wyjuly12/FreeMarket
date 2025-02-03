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
            return $this->belongsToMany('App\Models\Item')->withTimestamps();
        }


        public function pepole(){
            return $this->belongsToMany('App\Models\User')->withTimestamps();
        }


        public function getUserId(){
            return $this->person_id;
        }

        public function getComment(){
            return $this->comment;
        }



}
