<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $with = ["briefjes"];

    public function briefjes(){
        return $this->hasMany(\App\Models\Briefje::class);
    }
}
