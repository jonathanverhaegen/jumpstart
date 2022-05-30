<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $with = ["usersgroups", 'faqs'];

    public function usersgroups(){
        return $this->hasMany(\App\Models\UsersGroup::class);
    }

    public function faqs(){
        return $this->hasMany(\App\Models\Faq::class);
    }
}
