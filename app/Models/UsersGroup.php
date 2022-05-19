<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersGroup extends Model
{
    use HasFactory;
    
    public function users(){
        return $this->belongsToMany(\App\Models\Users::class);
    }
}
