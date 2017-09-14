<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'username', 'dob',
    ];
    
    protected $dates = [
        'dob',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    
    /// table relationship
    public function roles()
    {
        return $this->belongsToMany('App\Role', 'user_role', 'user_id', 'role_id');
    }
    
    /// roles functions
    public function hasAnyRole($roles)
    {
        if(is_array($roles)) {
            foreach($roles as $role) {
                if($this->hasRole($role))
                    return true;
            }
        } else {
            if($this->hasRole($roles))
                return true;
        }
        return false;
    }
    public function hasRole($role){
        if($this->roles()->whereName($role)->first()) {
            return true;
        }
        return false;
    }
    
    /// MUTATORS --- mutators
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
    
    /// ACCESSORS --- accessors
    public function getAgeAttribute($value)
    {
        $value = $this->attributes['dob'];
        return Carbon\Carbon::createFromFormat('Y-m-d', $value)->age;
    }
}
