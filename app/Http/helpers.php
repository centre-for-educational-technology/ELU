<?php


function getFirstParagraph($string)
{
  $string = substr($string,0, strpos($string, "</p>")+4);
  return $string;
}


/**
 * Return nav-here if current path begins with this path.
 *
 * @param string $path
 * @return string
 */
function setActive($path)
{
  return \Request::is($path . '*') ? ' class=active' :  '';
}


function isPath($path)
{
  return \Request::is($path . '*') ? true :  false;
}


/**
 * Get user full name or just name
 * Used in blade templates
 * @param \App\User $user
 * @return mixed
 */
function getUserName(\App\User $user)
{
  if(!empty($user->full_name)){
    return $user->full_name;
  }else{
    return $user->name;
  }
}

/**
 * Get user full name and course or just name
 * @param \App\User $user
 * @return mixed|string
 */
function getUserNameAndCourse(\App\User $user)
{
  if(!empty($user->full_name)){
    if(count($user->courses) >0){
      return $user->full_name.' / '.getCourseName($user->courses->first());
    }else{
      return $user->full_name;
    }

  }else{
    return $user->name;
  }
}

/**
 * Get user course if available
 * @param \App\User $user
 * @return string
 */
function getUserCourse(\App\User $user)
{
  if(!empty($user->full_name)){
    if(count($user->courses) >0){
      return getCourseName($user->courses->first());
    }

  }
  return '';
}


function isTLUUser(\App\User $user) {
  $needle = 'tlu.ee';

  // search forward starting from end minus needle length characters
  return $needle === "" || (($temp = strlen($user->email) - strlen($needle)) >= 0 && strpos($user->email, $needle, $temp) !== false);
}


/**
 * Get user first name and course if available
 * @param \App\User $user
 * @return mixed|string
 */
function getUserStrippedNameAndCourse(\App\User $user)
{
  if(!empty($user->full_name)){
    $parts = explode(" ", $user->full_name);
    $lastname = array_pop($parts);
    $firstname = implode(" ", $parts);
    if(count($user->courses) >0){

      return $firstname.' / '.getCourseName($user->courses->first());
    }else{
      return $firstname;
    }

  }else{
    $parts = explode(" ", $user->name);
    if (count($parts)>1){
      $lastname = array_pop($parts);
      $firstname = implode(" ", $parts);
    }else{
      $firstname = $user->name;
    }

    return $firstname;
  }
}


function getUserFirstName(\App\User $user)
{
  if(!empty($user->full_name)){
    $parts = explode(" ", $user->full_name);
    $lastname = array_pop($parts);
    $firstname = implode(" ", $parts);

    return $firstname;

  }else{
    $parts = explode(" ", $user->name);
    if (count($parts)>1){
      $lastname = array_pop($parts);
      $firstname = implode(" ", $parts);
    }else{
      $firstname = $user->name;
    }

    return $firstname;
  }
}

/**
 * Get the group user belongs to
 * @param \App\User $user
 * @return bool|mixed
 */
function userBelongsToGroup(\App\User $user)
{
  if(count($user->groups) > 0){
    return $user->groups;
  }else{
    return false;
  }
}

/**
 * Return true if project has groups with at least one member
 * @param \App\Project $project
 * @return bool
 */
function projectHasGroupsWithMembers(\App\Project $project){
  if(count($project->groups) > 0){
    foreach ($project->groups as $group){
      if(count($group->users) > 0){
        return true;
      }
    }
  }
  return false;
}

/**
 * Return true if project has at least on member
 * @param \App\Project $project
 * @return bool
 */
function projectHasUsers(\App\Project $project){
	foreach ($project->users as $user){
		if($user->pivot->participation_role == 'member'){
			return true;
		}
	}
	return false;
}


/**
 * Return projects this teacher is author of
 * @param \App\User $user
 * @return array
 */
function getTeacherProjects(\App\User $user){

  $projects = array();

  if($user->is('oppejoud')){

    if(count($user->projects)>0){
      foreach ($user->projects as $project){
        if($project->pivot->participation_role == 'author' ){
          array_push($projects, $project);
        }
      }
    }

  }
  return $projects;

}

/**
 * Check if this user is a member of that project
 * @param $user_id
 * @param $project_id
 * @return bool
 */
function isMemberOfProject($user_id, $project_id)
{

  $user = \App\User::find($user_id);
  $project = \App\Project::find($project_id);

  if(count($user->projects)>0){
    foreach ($user->projects as $user_project){
      if($user_project->id == $project->id){
        return true;
      }
    }
  }
  return false;


}


function getGroupUsersCourses(\App\Group $group){

  $courses = array();

  if(count($group->users)>0){
    foreach ($group->users as $user){
      $user_course =  getUserCourse($user);
      if($user_course != ''){
        array_push($courses, getUserCourse($user));
      }


    }

    return array_count_values($courses);
  }

  return false;

}

function getCourseName(\App\Course $course){
	if(\App::getLocale() == 'en'){
		return $course->oppekava_eng;
	}else{
		return $course->oppekava_est;
	}
}



/**
 * Get user email or contact email if available
 * @param \App\User $user
 * @return mixed
 */
function getUserEmail(\App\User $user){
  return $user->contact_email ? $user->contact_email : $user->email;
}


function getProjectSemester(\App\Project $project){
  if ( $project->study_term == 0 ){
    return trans('project.autumn_semester');
  }else if($project->study_term == 1){
    return trans('project.spring_semester');
  }else{
    return trans('project.both');
  }

}