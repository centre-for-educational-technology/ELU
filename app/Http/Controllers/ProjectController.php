<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ProjectRequest;

use App\Project;

use Illuminate\Support\Facades\Input;

class ProjectController extends Controller
{

  /**
   * Create a new controller instance.
   *
   * @return void
   */
//  public function __construct()
//  {
//    $this->middleware('auth');
//  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {

    $projects = Project::orderBy('created_at', 'desc')->paginate(10);


    return view('project.new')
        ->with('projects', $projects);
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


    $date_start = date_create_from_format('m/d/Y', $request->project_start);
    $project->start = date("Y-m-d", $date_start->getTimestamp());

    $date_end = date_create_from_format('m/d/Y', $request->project_end);
    $project->end = date("Y-m-d", $date_end->getTimestamp());


    $project->supervisor = $request->supervisors;


    $project->status = $request->status;

    $project->tags = $request->tags;



    $project->save();

    return view('project.all')
        ->with('projects', Project::orderBy('created_at', 'asc')->paginate(10));


//    return \Redirect::to('/')
//        ->with('message', 'Uus projekt on lisatud!')
//        ->with('projects', Project::orderBy('created_at', 'asc')->get());





  }




  public function update(ProjectRequest $request, $id)
  {



    \Debugbar::info($id);

    $project = Project::find($id);
    $project->name = $request->name;
    $project->description = $request->description;


    $project->project_outcomes = $request->project_outcomes;
    $project->student_outcomes = $request->student_outcomes;

    $project->courses = $request->related_courses;


    $project->institute = $request->institutes;


    $date_start = date_create_from_format('m/d/Y', $request->project_start);
    $project->start = date("Y-m-d", $date_start->getTimestamp());

    $date_end = date_create_from_format('m/d/Y', $request->project_end);
    $project->end = date("Y-m-d", $date_end->getTimestamp());


    $project->supervisor = $request->supervisors;


    $project->status = $request->status;

    $project->tags = $request->tags;



    $project->save();

//    return view('project')
//        ->with('projects', Project::orderBy('created_at', 'asc')->get());


    return \Redirect::to('/')
        ->with('message', 'Projekt on muudatud')
        ->with('projects', Project::orderBy('created_at', 'asc')->get());





  }



  public function search()
  {
    $name = Input::get('search');
    $projects = Project::where('name', 'LIKE', '%'.$name.'%')->get();
    return view('project.search')
        ->with('name', $name)
        ->with('projects', $projects);
  }
}
