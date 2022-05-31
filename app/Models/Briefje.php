<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Briefje extends Model
{
    use HasFactory;

    public function activity(){
        return $this->belongsTo(\App\Models\Activity::class);
    }
}
