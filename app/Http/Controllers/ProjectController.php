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
    return view('project')
        ->with('projects', Project::orderBy('created_at', 'asc')->get());
  }

  public function store(ProjectRequest $request)
  {

    $project = new Project;
    $project->name = $request->name;
    $project->description = $request->description;


    $project->project_outcomes = $request->project_outcomes;
    $project->student_outcomes = $request->student_outcomes;

    $project->courses = $request->related_courses;


    $project->institute = $request->institutes;


    $date_start = date_create_from_format('m/d/Y g:i A', $request->project_start);
    $project->start = date("Y-m-d H:i:s", $date_start->getTimestamp());

    $date_end = date_create_from_format('m/d/Y g:i A', $request->project_end);
    $project->end = date("Y-m-d H:i:s", $date_end->getTimestamp());


    $project->supervisor = $request->supervisors;


    $project->status = $request->status;

    $project->tags = $request->tags;



    $project->save();
//
//    return view('project-new')
//        ->with('projects', Project::orderBy('created_at', 'asc')->get());
//

    return \Redirect::to('/')
        ->with('message', 'Uus projekt on lisatud!')
        ->with('projects', Project::orderBy('created_at', 'asc')->get());





  }
}
