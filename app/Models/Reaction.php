<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    use HasFactory;

    protected $with = ["user", "attachment"];

    public function user(){
        return $this->belongsTo(\App\Models\User::class);
    }

    public function attachment(){
        return $this->hasOne(\App\Models\AttachmentsReaction::class);
    }
}
