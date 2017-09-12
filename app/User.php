<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'dob',
    ];
    
    protected $dates = [
        'dob',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }


    public function setUsernameAttribute($username)
    {
        $this->attributes['username'] = ucfirst($username);
    }
    public function setNameAttribute($name)
    {
        $this->attributes['name'] = ucfirst($name);
    }
    
    public function getAgeAttribute($value)
    {
        $value = $this->attributes['dob'];
        return Carbon\Carbon::createFromFormat('Y-m-d', $value)->age;
    }
}
