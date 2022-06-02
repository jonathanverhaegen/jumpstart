<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $with = ["sender", "reciever"];

    public function sender(){
        return $this->belongsTo(\App\Models\User::class, 'sender_id');
    }

    public function reciever(){
        return $this->belongsTo(\App\Models\User::class, 'reciever_id');
    }
}
