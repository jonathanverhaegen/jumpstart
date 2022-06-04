<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    protected $with = ["userone", "usertwo", "chats"];

    public function userone(){
        return $this->belongsTo(\App\Models\User::class, 'user_one');
    }

    public function usertwo(){
        return $this->belongsTo(\App\Models\User::class, 'user_two');
    }

    public function chats(){
        return $this->hasMany(\App\Models\Chat::class);
    }
}
