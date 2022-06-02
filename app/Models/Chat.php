<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $with = ["attachment"];

    public function attachment(){
        return $this->hasOne(\App\Models\AttachmentsChat::class);
    }
}
