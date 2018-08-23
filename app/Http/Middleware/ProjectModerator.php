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
        
        if (Project::find( $request->id)) {
          if ( canChangeTheProject(Auth::user(), Project::find($request->id)))
          {
            return $next($request);
          }
        }

        if (NewProject::find( $request->id)) {
          if ( canChangeTheNewProject(Auth::user(), NewProject::find($request->id)))
          {
            return $next($request);
          }
        }

      }


      return redirect('/');
    }
}
