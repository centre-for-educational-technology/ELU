<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function users(){
      return $this->hasMany('App\User');
    }

    public function projects(){
      return $this->hasMany('App\Project');
    }
}
