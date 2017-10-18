<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CosupervisorsPoints extends Model
{
	public function project()
	{
		return $this->hasOne('App\Project', 'foreign_key', 'project_id');
	}
}
