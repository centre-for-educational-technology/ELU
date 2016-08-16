<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ProjectRequest;

use App\Project;

class ProjectController extends Controller
{

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('project-new')
        ->with('projects', Project::orderBy('created_at', 'asc')->get());
  }

  public function store(ProjectRequest $request)
  {

    $project = new Project;
    $project->name = $request->name;
    $project->description = $request->description;
    $project->save();

    return \Redirect::to('/')
        ->with('message', 'Uus projekt on lisatud!')
        ->with('projects', Project::orderBy('created_at', 'asc')->get());
    




  }
}
