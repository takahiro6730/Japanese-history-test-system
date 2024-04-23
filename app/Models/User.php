<?php

namespace App\Models;


use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
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
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function reservation()
    {   
        return $this->hasMany('App\Models\Reservation');
    }
    public function test2users()
    {   
        return $this->hasMany('App\Models\Test2user');
    }
    public function get_reserve_count(){
        return sizeof($this->test2users->where('reservation_id', '<>', '0'));
    }
    public function get_allowed_count(){
        return sizeof($this->test2users->where('allowed_id', '<>', '0'));
    }
    public function get_passed_count(){
        return sizeof($this->test2users->where('passed_id', '<>', '0'));
    }
    
}
