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
 * Return true if
 * project has summary field filled in and
 * all the groups related to that project have Results, Activities and Reflection fields filled in
 * @param \App\Project $project
 * @return bool
 */
function isProjectResultsFilledIn(\App\Project $project){
	$completed = false;
	if ($project->summary_version == 1) {
		if(!empty($project->summary)){
			if(projectHasGroupsWithMembers($project)){
				foreach ($project->groups as $group){
					if(!empty($group->results) && !empty($group->activities) && !empty($group->reflection) && !empty($group->students_opinion) && !empty($group->supervisor_opinion)){
						$completed = true;
					}else{
						$completed = false;
					}
				}
			}
		}
	} else if ($project->summary_version == 2) {
		$completed = true;
	}
	return $completed;
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
 * Return projects that are active and this teacher is author of
 * @param \App\User $user
 * @return array
 */
function getActiveTeacherProjects(\App\User $user){

  $projects = array();

  if($user->is('oppejoud')){

    if(count($user->projects)>0){
      foreach ($user->projects as $project){
        if($project->pivot->participation_role == 'author' ){
          if ($project->publishing_status==1) {
						array_push($projects, $project);
					}
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
function isMemberOfProject(\App\User $current_user, \App\Project $project)
{

	if(count($project->users)>0){
		foreach ($project->users as $user){
			if($user->pivot->participation_role == 'member'){
				if($user->id == $current_user->id){
					return true;
				}
			}
		}
	}
	return false;
	
	
}


function isAuthorOfProject(\App\User $current_user, \App\Project $project){
	if(count($project->users)>0){
		foreach ($project->users as $user){
			if($user->pivot->participation_role == 'author'){
				if($user->id == $current_user->id){
					return true;
				}
			}
		}
	}
	return false;
	
}


function canChangeTheProject(\App\User $user, \App\Project $project){
	
	if($user->is('project_moderator') && isMemberOfProject($user, $project)) {
		return true;
	}elseif ($user->is('admin')){
		return true;
	}elseif ($user->is('oppejoud') && isAuthorOfProject($user, $project)){
		return true;
	}
	
	return false;
}


/**
 * Get course names of users that belong to that group
 * @param \App\Group $group
 * @return array|bool
 */
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

/**
 * Get course ids of users that belong to that group
 * @param \App\Group $group
 * @return array|bool
 */
function getGroupUsersCoursesIds(\App\Group $group){
	
	$courses = array();
	
	if(count($group->users)>0){
		foreach ($group->users as $user){
			
			if(!empty($user->full_name)){
				if(count($user->courses) >0){
					$user_course = $user->courses->first()->id;
				}else{
					$user_course = '';
				}
				
			}else{
				$user_course = '';
			}
			
		
			array_push($courses, $user_course);
			
			
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



function getProjectSemester(\App\Project $project)
{
	if ($project->study_term == 0) {
		return trans('project.autumn_semester');
	} else if ($project->study_term == 1) {
		return trans('project.spring_semester');
	} else if ($project->study_term == 2) {
		return trans('project.autumn_spring');
	} else {
		return trans('project.spring_autumn');
	}
}

/**
 * Check if this user can join the project.
 * Return true if there are less than 3 users in the group that have the same course as this user. (Or less than 3 local users with no course)
 * @param \App\Group $group
 * @param \App\User $user
 * @return bool
 */
function checkIfCourseOfThisUserIsAcceptable(\App\Group $group, \App\User $user){
	
	$user_course = null;
	if(!empty($user->full_name)){
		if(count($user->courses) > 0){
			$user_course = $user->courses->first()->id;
		}else{
			//User without course
			$user_course = '';
		}
		
	}else{
		//local account student
		$user_course = '';
	}

	if(getGroupUsersCoursesIds($group)){
		foreach (getGroupUsersCoursesIds($group) as $course_id => $times){
			if($course_id == $user_course && $times>=3){
				return false;
			}
			
		}
	}
	
	
	return true;
	
}

/**
 * Return true if one of the groups has less than 8 members and all 3 groups are in use
 * @param \App\Project $project
 * @return bool
 */
function checkIfThereIsSpaceInProjectGroups(\App\Project $project){
	if(count($project->groups) < 3){
		return true;
	}else{
		foreach ($project->groups as $group){
			if(count($group->users) < 8){
				return true;
			}
		}
	}
	
	return false;
}