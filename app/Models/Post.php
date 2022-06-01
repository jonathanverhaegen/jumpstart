<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $with = ["user", "attachments"];

    public function user(){
        return $this->belongsTo(\App\Models\User::class);
    }

    public function attachments(){
        return $this->hasMany(\App\Models\AttachmentsPost::class);
    }
}
