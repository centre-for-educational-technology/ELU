<?php

namespace App\Http\Middleware;

use App\NewProject;
use App\Project;
use Closure;
use Illuminate\Support\Facades\Auth;

class ProjectModerator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
*/
    public function handle($request, Closure $next)
    {
      if(Auth::check()){
      	
        if ( canChangeTheProject(Auth::user(), Project::find( $request->id)))
        {
          return $next($request);
        }

        if ( canChangeTheNewProject(Auth::user(), NewProject::find( $request->id)))
        {
          return $next($request);
        }

      }


      return redirect('/');
    }
}
