<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

  public function roles()
  {
    return $this->belongsToMany('App\Role');
  }

  public function courses(){
    return $this->belongsToMany('App\Course')->withPivot('degree');
  }

  public function projects(){
    return $this->hasMany('App\Project');
  }


  public function is($roleName)
  {
    foreach ($this->roles()->get() as $role)
    {
      if ($role->name == $roleName)
      {
        return true;
      }
    }

    return false;
  }
}
