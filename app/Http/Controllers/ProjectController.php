<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ProjectRequest;

use App\Project;

use Illuminate\Support\Facades\Input;

use Cohensive\Embed\Facades\Embed;

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


    return view('project.all')
        ->with('projects', $projects);

  }



  public function add()
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


    if($request->embedded != null){

      $embed = Embed::make($request->embedded)->parseUrl();

      if ($embed) {
        // Set width of the embed.
        $embed->setAttribute(['width' => 600]);

      }

      $embed_html = $embed->getHtml();

      $project->embedded = $embed_html;

    }


    $project->integrated_areas = $request->integrated_areas;

    $project->study_term = $request->study_term;


//    $project->project_outcomes = $request->project_outcomes;
//    $project->student_outcomes = $request->student_outcomes;
//
//    $project->courses = $request->related_courses;
//
//
//    $project->institute = $request->institutes;


//    $date_start = date_create_from_format('m/d/Y', $request->project_start);
//    $project->start = date("Y-m-d", $date_start->getTimestamp());
//
//    $date_end = date_create_from_format('m/d/Y', $request->project_end);
//    $project->end = date("Y-m-d", $date_end->getTimestamp());


    $project->supervisor = $request->supervisors;


    $project->status = $request->status;

    $project->tags = $request->tags;

    $project->join_link = $request->join_link;



    $project->save();

    return view('project.all')
        ->with('projects', Project::orderBy('created_at', 'desc')->paginate(10));


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




    if($request->embedded != null){

      $embed = Embed::make($request->embedded)->parseUrl();

      if ($embed) {
        // Set width of the embed.
        $embed->setAttribute(['width' => 600]);

      }

      $embed_html = $embed->getHtml();

      $project->embedded = $embed_html;

    }

    $project->integrated_areas = $request->integrated_areas;

    $project->study_term = $request->study_term;


//    $project->project_outcomes = $request->project_outcomes;
//    $project->student_outcomes = $request->student_outcomes;
//
//    $project->courses = $request->related_courses;
//
//
//    $project->institute = $request->institutes;
//
//
//    $date_start = date_create_from_format('m/d/Y', $request->project_start);
//    $project->start = date("Y-m-d", $date_start->getTimestamp());
//
//    $date_end = date_create_from_format('m/d/Y', $request->project_end);
//    $project->end = date("Y-m-d", $date_end->getTimestamp());


    $project->supervisor = $request->supervisors;


    $project->status = $request->status;

    $project->tags = $request->tags;

    $project->join_link = $request->join_link;



    $project->save();

//    return view('project')
//        ->with('projects', Project::orderBy('created_at', 'asc')->get());


    return \Redirect::to('projects-all')
        ->with('message', 'Projekt '.$project->name.' on muudatud')
        ->with('projects', Project::orderBy('created_at', 'desc')->get());





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
