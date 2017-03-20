<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Traits\LogsActivity;



class Project extends Model
{
  use LogsActivity;

  public function users()
  {
    return $this->belongsToMany('App\User')->withPivot('participation_role');
  }


  public function groups()
  {
    return $this->hasMany('App\Group');
  }


  //XXX change method name to courses when courses column is deleted from Projects table
  public function getCourses()
  {
    return $this->belongsToMany('App\Course');
  }


  public function currentUserIs($participation_role)
  {
    foreach ($this->users()->get() as $user)
    {
      if ($user->id == Auth::user()->id && $user->pivot->participation_role == $participation_role)
      {
        return true;
      }
    }

    return false;
  }

}
