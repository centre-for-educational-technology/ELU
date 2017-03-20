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