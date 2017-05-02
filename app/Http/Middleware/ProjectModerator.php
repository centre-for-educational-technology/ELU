<?php

namespace App\Http\Middleware;

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
        if ( (Auth::user()->is('project_moderator') && isMemberOfProject(Auth::user()->id, $request->id)) || Auth::user()->is('oppejoud'))
        {
          return $next($request);
        }

      }


      return redirect('/');
    }
}
