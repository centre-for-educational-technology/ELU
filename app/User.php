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
        'name', 'email', 'password', 'course', 'institution',
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
    return $this->belongsToMany('App\Project')->withPivot('participation_role', 'points', 'join_a1', 'join_a2', 'join_a3', 'join_extra_a1', 'join_extra_a2');
  }

  public function groups(){
    return $this->belongsToMany('App\Group');
  }


  public function isMemberOfProject(){
    foreach ($this->projects()->get() as $project){
      if($project->pivot->participation_role == 'member'){
        if($project->requires_review == false){
          return array('name' => $project->name,
              'id'=>$project->id);
        }

      }

    }
    return false;
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


  public function getGravatarAttribute()
  {
    $hash = md5(strtolower(trim($this->attributes['email'])));
    return "https://www.gravatar.com/avatar/$hash";
  }
}
