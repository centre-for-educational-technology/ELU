<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OutsideProject extends Model
{
    public function users()
  {
    return $this->belongsToMany('App\User')->withPivot('participation_role');
  }
}
