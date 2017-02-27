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