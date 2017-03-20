<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
  public function project()
  {
    return $this->hasOne('App\Project', 'foreign_key', 'project_id');
  }

  public function users()
  {
    return $this->belongsToMany('App\User');
  }
}
