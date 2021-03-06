<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'google2fa_secret'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'google2fa_secret'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    protected $with = ["roadmap", "usersgroups", "company", "agent", "stopinfo", "education"];

    public function roadmap(){
        return $this->hasOne(\App\Models\Roadmap::class);
    }


    public function setGoogle2faSecretAttribute($value)
    {
         $this->attributes['google2fa_secret'] = encrypt($value);
    }

    public function getGoogle2faSecretAttribute($value)
    {
        return decrypt($value);
    }

    public function usersgroups(){
        return $this->hasMany(\App\Models\UsersGroup::class);
    }

    public function company(){
        return $this->hasOne(\App\Models\Company::class);
    }

    public function agent(){
        return $this->hasOne(\App\Models\Agent::class);
    }

    public function stopinfo(){
        return $this->hasOne(\App\Models\Stopinfo::class);
    }

    public function education(){
        return $this->belongsTo(\App\Models\Education::class);
    }
}
