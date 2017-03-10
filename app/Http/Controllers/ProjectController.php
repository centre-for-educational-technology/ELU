<?php

namespace App\Http\Controllers;

use App\Course;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ProjectRequest;
use App\Http\Requests\ProjectByStudentRequest;

use App\Project;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

use Cohensive\Embed\Facades\Embed;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;




class ProjectController extends Controller
{


  /**
   * List the published projects
   *
   */
  public function indexOpenProjects()
  {


    $projects = Project::where('publishing_status', '=', '1')->where('status', '=', '1')->where('join_deadline', '>=', Carbon::today()->format('Y-m-d'))->orderBy('name', 'asc')->paginate(20);

    if(Auth::user()){
      return view('project.search')
          ->with('projects', $projects)
          ->with('isTeacher', Auth::user()->is('oppejoud'));
    }else{
      return view('project.search')
          ->with('projects', $projects)
          ->with('isTeacher', false);
    }



  }


  /**
   * List ongoing projects
   *
   */
  public function indexOngoingProjects()
  {


    $projects = Project::where('publishing_status', '=', '1')->where('status', '=', '1')->where('join_deadline', '<', Carbon::today()->format('Y-m-d'))->orderBy('name', 'asc')->paginate(20);

    if(Auth::user()){
      return view('project.search')
          ->with('projects', $projects)
          ->with('isTeacher', Auth::user()->is('oppejoud'));
    }else{
      return view('project.search')
          ->with('projects', $projects)
          ->with('isTeacher', false);
    }



  }


  /**
   * List finished projects
   *
   */
  public function indexFinishedProjects()
  {


    $projects = Project::where('publishing_status', '=', '1')->where('status', '=', '0')->orderBy('name', 'asc')->paginate(20);

    if(Auth::user()){
      return view('project.search')
          ->with('projects', $projects)
          ->with('isTeacher', Auth::user()->is('oppejoud'));
    }else{
      return view('project.search')
          ->with('projects', $projects)
          ->with('isTeacher', false);
    }



  }


  /**
   * Add new project form
   */
  public function add()
  {

    $projects = Project::whereHas('users', function($q)
    {
      $q->where('id', Auth::user()->id);
    })->get();




    $teachers = User::select('id','name', 'full_name')->whereHas('roles', function($q)
    {
      $q->where('name', 'oppejoud');
    })->get();



    $courses = Course::select('id','name')->get();


    $author =  Auth::user()->id;

    return view('project.new', compact('teachers', 'author', 'projects', 'courses'));


  }


  /**
   * Save new project
   */
  public function store(ProjectRequest $request)
  {


    $project = new Project;
    $project->name = $request->name;
    $project->description = $request->description;


    if($request->embedded != null){

      $embed = Embed::make($request->embedded)->parseUrl();

      if ($embed) {
        // Set width of the embed
        $embed->setAttribute(['width' => 600]);

      }

      $embed_html = $embed->getHtml();

      $project->embedded = $embed_html;

    }


//    $project->integrated_areas = $request->integrated_areas;


      $project->meeting_info = $request->meeting_info;

      $project->study_term = $request->study_term;

      $project->study_year = $request->study_year;


//    $project->project_outcomes = $request->project_outcomes;
//    $project->student_outcomes = $request->student_outcomes;
//


//    $project->courses = $request->related_courses;


//    $project->institute = $request->institutes;

//    if($request->project_start){
//      $date_start = date_create_from_format('m/d/Y', $request->project_start);
//      $project->start = date("Y-m-d", $date_start->getTimestamp());
//    }
//
//    if($request->project_end){
//      $date_end = date_create_from_format('m/d/Y', $request->project_end);
//      $project->end = date("Y-m-d", $date_end->getTimestamp());
//    }


    // Co-supervisors saved into supervisor column
    // Main supervisors linked in pivot table
    $project->supervisor = $request->cosupervisors;

    $project->status = $request->status;

    $project->tags = $request->tags;

    $project->group_link = $request->group_link;


    $project->language = $request->language;

    $project->publishing_status = $request->publishing_status;


    $project->extra_info = $request->extra_info;


    $join_deadline = date_create_from_format('m/d/Y', $request->join_deadline);
    $project->join_deadline = date("Y-m-d", $join_deadline->getTimestamp());


    //Need that to get id
    $project->save();

    if($request->featured_image != null){
      $project->featured_image = $this->uploadFeaturedImage($request, $project->id);
    }

    $project->save();


    //Attach study areas
    $study_areas = $request->input('study_areas');
    foreach ($study_areas as $study_area){

      $project->getCourses()->attach($study_area);
    }


    //Attach users with teacher role
    $supervisors = $request->input('supervisors');
    foreach ($supervisors as $supervisor){

      $project->users()->attach($supervisor, ['participation_role' => 'author']);
    }



    $projects = Project::whereHas('users', function($q)
    {
      $q->where('participation_role','LIKE','%author%')->where('id', Auth::user()->id);
    })->orderBy('created_at', 'desc')->paginate(5);



    return \Redirect::to('teacher/my-projects')
        ->with('message', 'Uus projekt on lisatud!')
        ->with('projects', $projects);



  }



  /**
   * Update project info
   */
  public function update(ProjectRequest $request, $id)
  {

    \Debugbar::info($id);

    $project = Project::find($id);
    $project->name = $request->name;
    $project->description = $request->description;


    if($request->embedded != null){

      $embed = Embed::make($request->embedded)->parseUrl();

      if ($embed) {
        // Set width of the embed
        $embed->setAttribute(['width' => 600]);

      }

      $embed_html = $embed->getHtml();

      $project->embedded = $embed_html;

    }

    //XXX to be removed
    $project->integrated_areas = $request->integrated_areas;



    $project->meeting_info = $request->meeting_info;

    //Attach study areas
    $study_areas = $request->input('study_areas');
    $project->getCourses()->sync($study_areas);


    $project->study_term = $request->study_term;

    $project->study_year = $request->study_year;



//    $project->project_outcomes = $request->project_outcomes;
//    $project->student_outcomes = $request->student_outcomes;
//

    //XXX to be removed
    $project->courses = $request->related_courses;


//    $project->institute = $request->institutes;
//
//
//    if($request->project_start){
//      $date_start = date_create_from_format('m/d/Y', $request->project_start);
//      $project->start = date("Y-m-d", $date_start->getTimestamp());
//    }
//
//    if($request->project_end){
//      $date_end = date_create_from_format('m/d/Y', $request->project_end);
//      $project->end = date("Y-m-d", $date_end->getTimestamp());
//    }


    $project->supervisor = $request->cosupervisors;

    $project->status = $request->status;

    $project->tags = $request->tags;

    $project->group_link = $request->group_link;

    $project->language = $request->language;

    $project->publishing_status = $request->publishing_status;


    $project->extra_info = $request->extra_info;


    $join_deadline = date_create_from_format('m/d/Y', $request->join_deadline);
    $project->join_deadline = date("Y-m-d", $join_deadline->getTimestamp());

    $project->submitted_by_student = false;



    if($request->featured_image != null){
      if($project->featured_image !=null){

        File::delete(public_path('storage/projects_featured_images/') .$project->featured_image);
      }
      $project->featured_image = $this->uploadFeaturedImage($request, $project->id);
    }

    $project->save();



    //Detaching teachers
    $teachers = $project->users()->wherePivot('participation_role', 'author')->get();

    if(count($teachers)){
      $project->users()->detach($teachers);
    }



    //Attach users with teacher role
    $supervisors = $request->input('supervisors');
    foreach ($supervisors as $supervisor){

      $project->users()->attach($supervisor, ['participation_role' => 'author']);
    }


    $projects = Project::whereHas('users', function($q)
    {
      $q->where('participation_role','LIKE','%author%')->where('id', Auth::user()->id);
    })->orderBy('created_at', 'desc')->paginate(5);


    return \Redirect::to('teacher/my-projects')
        ->with('message', trans('project.project_changed_notification', ['name' => $project->name]))
        ->with('projects', $projects);

  }


  /**
   * Search published projects by
   * author
   * member
   * title, description, extra info
   *
   * @param Request $request
   * @return mixed
   */
  private function searchPublishedProjects(Request $request){

    $name = $request->search;
    $param = $request->search_param;


    if($param == 'author'){

      $projects = Project::whereHas('users', function($q) use ($name)
      {
        $q->where(function($subq) use ($name) {
          $subq->where('name', 'LIKE', '%'.$name.'%')
              ->orWhere('full_name', 'LIKE', '%'.$name.'%');
        })->where('participation_role','LIKE','%author%');
      })->where('publishing_status', 1)->orderBy('name', 'asc')->paginate(20)->appends(['search' => $name, 'search_param' => $param]);


    }elseif ($param == 'member'){

      $projects = Project::whereHas('users', function($q) use ($name)
      {
        $q->where(function($subq) use ($name) {
          $subq->where('name', 'LIKE', '%'.$name.'%')
              ->orWhere('full_name', 'LIKE', '%'.$name.'%');
        })->where('participation_role','LIKE','%member%');
      })->where('publishing_status', 1)->orderBy('name', 'asc')->paginate(20)->appends(['search' => $name, 'search_param' => $param]);


    }else{
      $projects = Project::where('publishing_status', 1)
          ->where(function ($query) use ($name) {
            $query->where('name', 'LIKE', '%'.$name.'%');
            $query->orWhere('tags', 'LIKE', '%'.$name.'%');
            $query->orWhere('description', 'LIKE', '%'.$name.'%');
            $query->orWhere('extra_info', 'LIKE', '%'.$name.'%');
          })->orderBy('name', 'asc')->paginate(20)->appends(['search' => $name, 'search_param' => $param]);

    }

    return $projects;
  }


  /**
   * Search open projects by
   * author
   * member
   * title, description, extra info
   *
   * @param Request $request
   * @return mixed
   */
  private function searchOpenProjects(Request $request){

    $name = $request->search;
    $param = $request->search_param;


    if($param == 'author'){

      $projects = Project::whereHas('users', function($q) use ($name)
      {
        $q->where(function($subq) use ($name) {
          $subq->where('name', 'LIKE', '%'.$name.'%')
              ->orWhere('full_name', 'LIKE', '%'.$name.'%');
        })->where('participation_role','LIKE','%author%');
      })->where('publishing_status', 1)->where('status', '=', '1')->where('join_deadline', '>=', Carbon::today()->format('Y-m-d'))->orderBy('name', 'asc')->paginate(20)->appends(['search' => $name, 'search_param' => $param]);


    }elseif ($param == 'member'){

      $projects = Project::whereHas('users', function($q) use ($name)
      {
        $q->where(function($subq) use ($name) {
          $subq->where('name', 'LIKE', '%'.$name.'%')
              ->orWhere('full_name', 'LIKE', '%'.$name.'%');
        })->where('participation_role','LIKE','%member%');
      })->where('publishing_status', 1)->where('status', '=', '1')->where('join_deadline', '>=', Carbon::today()->format('Y-m-d'))->orderBy('name', 'asc')->paginate(20)->appends(['search' => $name, 'search_param' => $param]);


    }else{
      $projects = Project::where('publishing_status', 1)->where('status', '=', '1')->where('join_deadline', '>=', Carbon::today()->format('Y-m-d'))
          ->where(function ($query) use ($name) {
            $query->where('name', 'LIKE', '%'.$name.'%');
            $query->orWhere('tags', 'LIKE', '%'.$name.'%');
            $query->orWhere('description', 'LIKE', '%'.$name.'%');
            $query->orWhere('extra_info', 'LIKE', '%'.$name.'%');
          })->orderBy('name', 'asc')->paginate(20)->appends(['search' => $name, 'search_param' => $param]);

    }

    return $projects;
  }



  /**
   * Search ongoing projects by
   * author
   * member
   * title, description, extra info
   *
   * @param Request $request
   * @return mixed
   */
  private function searchOngoingProjects(Request $request){

    $name = $request->search;
    $param = $request->search_param;


    if($param == 'author'){

      $projects = Project::whereHas('users', function($q) use ($name)
      {
        $q->where(function($subq) use ($name) {
          $subq->where('name', 'LIKE', '%'.$name.'%')
              ->orWhere('full_name', 'LIKE', '%'.$name.'%');
        })->where('participation_role','LIKE','%author%');
      })->where('publishing_status', 1)->where('status', '=', '1')->where('join_deadline', '<', Carbon::today()->format('Y-m-d'))->orderBy('name', 'asc')->paginate(20)->appends(['search' => $name, 'search_param' => $param]);


    }elseif ($param == 'member'){

      $projects = Project::whereHas('users', function($q) use ($name)
      {
        $q->where(function($subq) use ($name) {
          $subq->where('name', 'LIKE', '%'.$name.'%')
              ->orWhere('full_name', 'LIKE', '%'.$name.'%');
        })->where('participation_role','LIKE','%member%');
      })->where('publishing_status', 1)->where('status', '=', '1')->where('join_deadline', '<', Carbon::today()->format('Y-m-d'))->orderBy('name', 'asc')->paginate(20)->appends(['search' => $name, 'search_param' => $param]);


    }else{
      $projects = Project::where('publishing_status', 1)->where('status', '=', '1')->where('join_deadline', '<', Carbon::today()->format('Y-m-d'))
          ->where(function ($query) use ($name) {
            $query->where('name', 'LIKE', '%'.$name.'%');
            $query->orWhere('tags', 'LIKE', '%'.$name.'%');
            $query->orWhere('description', 'LIKE', '%'.$name.'%');
            $query->orWhere('extra_info', 'LIKE', '%'.$name.'%');
          })->orderBy('name', 'asc')->paginate(20)->appends(['search' => $name, 'search_param' => $param]);

    }

    return $projects;
  }



  /**
   * Search finished projects by
   * author
   * member
   * title, description, extra info
   *
   * @param Request $request
   * @return mixed
   */
  private function searchFinishedProjects(Request $request){

    $name = $request->search;
    $param = $request->search_param;


    if($param == 'author'){

      $projects = Project::whereHas('users', function($q) use ($name)
      {
        $q->where(function($subq) use ($name) {
          $subq->where('name', 'LIKE', '%'.$name.'%')
              ->orWhere('full_name', 'LIKE', '%'.$name.'%');
        })->where('participation_role','LIKE','%author%');
      })->where('publishing_status', 1)->where('status', '=', '0')->orderBy('name', 'asc')->paginate(20)->appends(['search' => $name, 'search_param' => $param]);


    }elseif ($param == 'member'){

      $projects = Project::whereHas('users', function($q) use ($name)
      {
        $q->where(function($subq) use ($name) {
          $subq->where('name', 'LIKE', '%'.$name.'%')
              ->orWhere('full_name', 'LIKE', '%'.$name.'%');
        })->where('participation_role','LIKE','%member%');
      })->where('publishing_status', 1)->where('status', '=', '0')->orderBy('name', 'asc')->paginate(20)->appends(['search' => $name, 'search_param' => $param]);


    }else{
      $projects = Project::where('publishing_status', 1)->where('status', '=', '0')
          ->where(function ($query) use ($name) {
            $query->where('name', 'LIKE', '%'.$name.'%');
            $query->orWhere('tags', 'LIKE', '%'.$name.'%');
            $query->orWhere('description', 'LIKE', '%'.$name.'%');
            $query->orWhere('extra_info', 'LIKE', '%'.$name.'%');
          })->orderBy('name', 'asc')->paginate(20)->appends(['search' => $name, 'search_param' => $param]);

    }

    return $projects;
  }



  /**
   * Get open projects search
   */
  public function getOpenProjectsSearch(Request $request)
  {

    $name = $request->search;
    $param = $request->search_param;


    if(Auth::user()){
      return view('project.search')
          ->with('name', $name)
          ->with('param', $param)
          ->with('projects', $this->searchOpenProjects($request))
          ->with('isTeacher', Auth::user()->is('oppejoud'));

    }else{
      return view('project.search')
          ->with('name', $name)
          ->with('param', $param)
          ->with('projects', $this->searchOpenProjects($request))
          ->with('isTeacher', false);
    }

  }


  /**
   * Get ongoing projects search
   */
  public function getOngoingProjectsSearch(Request $request)
  {

    $name = $request->search;
    $param = $request->search_param;


    if(Auth::user()){
      return view('project.search')
          ->with('name', $name)
          ->with('param', $param)
          ->with('projects', $this->searchOngoingProjects($request))
          ->with('isTeacher', Auth::user()->is('oppejoud'));

    }else{
      return view('project.search')
          ->with('name', $name)
          ->with('param', $param)
          ->with('projects', $this->searchOngoingProjects($request))
          ->with('isTeacher', false);
    }

  }


  /**
   * Get finished projects search
   */
  public function getFinishedProjectsSearch(Request $request)
  {

    $name = $request->search;
    $param = $request->search_param;


    if(Auth::user()){
      return view('project.search')
          ->with('name', $name)
          ->with('param', $param)
          ->with('projects', $this->searchFinishedProjects($request))
          ->with('isTeacher', Auth::user()->is('oppejoud'));

    }else{
      return view('project.search')
          ->with('name', $name)
          ->with('param', $param)
          ->with('projects', $this->searchFinishedProjects($request))
          ->with('isTeacher', false);
    }

  }


  /**
   * Search published and unpublished projects by
   * author
   * member
   * title, description, extra info
   *
   * @param Request $request
   * @return mixed
   */
  private function searchAllProjects(Request &$request)
  {
    $name = $request->search;
    $param = $request->search_param;

    if($param == 'author'){

      $projects = Project::whereHas('users', function($q) use ($name)
      {
        $q->where(function($subq) use ($name) {
          $subq->where('name', 'LIKE', '%'.$name.'%')
              ->orWhere('full_name', 'LIKE', '%'.$name.'%');
        })->where('participation_role','LIKE','%author%');
      })->orderBy('name', 'asc')->paginate(10)->appends(['search' => $name, 'search_param' => $param]);


    }elseif ($param == 'member'){

      $projects = Project::whereHas('users', function($q) use ($name)
      {
        $q->where(function($subq) use ($name) {
          $subq->where('name', 'LIKE', '%'.$name.'%')
              ->orWhere('full_name', 'LIKE', '%'.$name.'%');
        })->where('participation_role','LIKE','%member%');
      })->orderBy('name', 'asc')->paginate(10)->appends(['search' => $name, 'search_param' => $param]);


    }else{
      $projects = Project::where(function ($query) use ($name) {
        $query->where('name', 'LIKE', '%'.$name.'%');
        $query->orWhere('tags', 'LIKE', '%'.$name.'%');
        $query->orWhere('description', 'LIKE', '%'.$name.'%');
        $query->orWhere('extra_info', 'LIKE', '%'.$name.'%');
      })->orderBy('name', 'asc')->paginate(10)->appends(['search' => $name, 'search_param' => $param]);
    }


    return $projects;

  }


  /**
   * Search the admin listing of projects
   */
  public function getAllProjectsSearch(Request $request)
  {

    return view('admin.all_projects')
        ->with('name', $request->search)
        ->with('param', $request->search_param)
        ->with('projects', $this->searchAllProjects($request));
  }


  /**
   * Join project team is used by user with student role
   */
  public function joinProject($id)
  {
    $project = Project::find($id);

    //Attach user with member role

    $project->users()->attach(Auth::user()->id, ['participation_role' => 'member']);


    return \Redirect::to('project/'.$project->id)
        ->with('message', [
            'text' => trans('project.joined_project_notification').' "'.$project->name.'"',
            'type' => 'joined'
        ])
        ->with('project', $project);

  }

  private static function getUserName(User $user){

    if(!empty($user->full_name)){
      return $user->full_name;
    }else{
      return $user->name;
    }
  }


  /**
   * Attach user to project manually (used by admin)
   */
  public function attachUsersToProject($id, Request $request)
  {

    $project = Project::find($id);
    $names = '';

    //Attach users with teacher role
    $users = $request->input('attached-users');
    foreach ($users as $user) {


      if ($user === end($users)){
        $names .= self::getUserName(User::find($user));
      }else{
        //Attach user with member role
        $names .= self::getUserName(User::find($user)) . ', ';
      }

      $project->users()->attach($user, ['participation_role' => 'member']);
    }



    return \Redirect::to('project/'.$project->id.'/edit')
        ->with('message', trans('project.students_attached_notification').$names);
  }



  /**
   * Leave project team is used by user with student role
   */
  public function leaveProject($id)
  {
    $project = Project::find($id);

    $project->users()->detach(Auth::user()->id);

    $projects = Project::whereHas('users', function($q)
    {
      $q->where('participation_role','LIKE','%member%')->where('id', Auth::user()->id);
    })->orderBy('created_at', 'desc')->paginate(5);


    return \Redirect::to('student/my-projects')
        ->with('message', [
            'text' => trans('project.left_project_notification').' "'.$project->name.'"',
            'type' => 'left'
        ]);

  }


  /**
   * Unlink member from project team is used by user with teacher role
   */
  public function unlinkMember($projectId, $userId)
  {
    $project = Project::find($projectId);

    $project->users()->detach($userId);

    $user = User::find($userId);

    if(!empty($user->full_name)){
      return redirect()->route('project_edit', ['id' => $project->id])
          ->with('message', 'Oled '.$user->full_name.' projektist '.$project->name.' kustutanud.');
    }else{
      return redirect()->route('project_edit', ['id' => $project->id])
          ->with('message', 'Oled '.$user->name.' projektist '.$project->name.' kustutanud.');
    }

  }


  /**
   * Store project proposal by student
   * This goes to moderation
   */
  public function storeProjectByStudent(ProjectByStudentRequest $request)
  {

    $project = new Project;
    $project->name = $request->name;
    $project->description = $request->description;

//    $project->integrated_areas = $request->integrated_areas;

    $project->study_term = $request->study_term;

//    $project->institute = $request->institutes;

    $project->supervisor = $request->cosupervisors;

    $project->tags = $request->tags;

    $project->publishing_status = 0;

    $project->study_year = $request->study_year;

    $project->extra_info = $request->extra_info;

    $project->submitted_by_student = true;

    $project->save();

    //Attach study areas
    $study_areas = $request->input('study_areas');
    foreach ($study_areas as $study_area){

      $project->getCourses()->attach($study_area);
    }

    $project->users()->attach(Auth::user()->id, ['participation_role' => 'member']);


    return \Redirect::to('projects/open')
        ->with('message', [
            'text' => trans('project.project_sent_to_moderation_notification', ['name' => $project->name]),
            'type' => 'proposal'
        ]);

  }


  /**
   * Admin analytics of projects view
   */
  public function indexAnalytics()
  {

    $projects = Project::where('publishing_status', '=', '1')->orderBy('name', 'asc')->paginate(20);




    return view('admin.analytics')
        ->with('projects', $projects)
        ->with('projects_count', Project::where('publishing_status', '=', '1')->count())
        ->with('users_count', User::count());

  }


  /**
   * Search the admin analytics listing of projects
   */
  public function getAdminAnalyticsListing(Request $request)
  {

    return view('admin.analytics')
        ->with('name', $request->search)
        ->with('param', $request->search_param)
        ->with('projects', $this->searchPublishedProjects($request))
        ->with('projects_count', Project::where('publishing_status', '=', '1')->count())
        ->with('users_count', User::count());
  }


  private function getProjectAuthorsNamesAndEmails(Project $project){
    $authors = array();
    foreach ($project->users as $user){

      if($user->pivot->participation_role == 'author'){
        if(!empty($user->full_name)){

          array_push($authors, $user->full_name.' ('.$user->email.')');
        }else{
          array_push($authors, $user->name.' ('.$user->email.')');
        }

      }
    }

    return $authors;
  }


  private function getProjectCosupervisors(Project $project){
    $cosupervisors = array();
    foreach (preg_split("/\\r\\n|\\r|\\n/", $project->supervisor) as $single_cosupervisor) {

      array_push($cosupervisors, $single_cosupervisor);

    }
    return $cosupervisors;
  }


  private function getProjectMembersData(Project $project){
    $members = array();
    foreach ($project->users as $user){

      if($user->pivot->participation_role == 'member'){
        if(!empty($user->full_name)){


          if(!$user->courses->isEmpty()){
            $course = $user->courses->first();
            array_push($members, $user->full_name.' / '.$course['name'].' ('.$user->email.')');

          }else{

            array_push($members, $user->full_name.' ('.$user->email.')');
          }
        }else{
          array_push($members, $user->name.' ('.$user->email.')');
        }

      }
    }


    return $members;
  }


  private static function arrayToImplodeString(array $data){

    return implode(', ', $data);
  }


  /**
   * Get project statistics in form of csv file
   */
  public function exportAnalyticsToCSV()
  {


    $headers = array(
        "Content-type" => "text/csv",
        "Content-Disposition" => "attachment; filename=elu.csv",
        "Pragma" => "no-cache",
        "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
        "Expires" => "0"
    );


    $projects = Project::where('publishing_status', '=', '1')->orderBy('name', 'asc')->get();

    $columns = array(trans('project.project'), trans('project.supervisor'), trans('project.cosupervisor'), trans('search.team'), 'Õpilaste arv');


    $callback = function() use ($projects, $columns)
    {
      $handle = fopen('php://output', 'w');
      fputcsv($handle, $columns);

      foreach($projects as $project) {

        $authors = $this->getProjectAuthorsNamesAndEmails($project);
        $members = $this->getProjectMembersData($project);
        $cosupervisors = $this->getProjectCosupervisors($project);

        fputcsv($handle, array($project->name, self::arrayToImplodeString($authors), self::arrayToImplodeString($cosupervisors), self::arrayToImplodeString($members), count($members)), ',');
      }


      fclose($handle);
    };




    return Response::stream($callback, 200, $headers);
  }


  /**
   * Search user api
   */
  public function searchUser(Request $request){

    $user = $request->q;

    $project_id = $request->project_id;


    //Get users that are not members of this project
    $users = User::where(function ($query) use ($user, $project_id) {
      $query->where('name', 'LIKE', '%'.$user.'%')
          ->whereNotIn('id', function ($query) use ($project_id)
          {
            $query->select('user_id')
                ->from('project_user')
                ->where('project_id', '=', $project_id);
          });
    })->orWhere(function($query) use ($user, $project_id) {
      $query->where('full_name', 'LIKE', '%'.$user.'%')
          ->whereNotIn('id', function ($query) use ($project_id)
          {
            $query->select('user_id')
                ->from('project_user')
                ->where('project_id', '=', $project_id);
          });
    })->orWhere(function($query) use ($user, $project_id) {
      $query->where('email', 'LIKE', '%'.$user.'%')
          ->whereNotIn('id', function ($query) use ($project_id)
          {
            $query->select('user_id')
                ->from('project_user')
                ->where('project_id', '=', $project_id);
          });
    })->get();


    return Response::json($users);

  }


  /**
   * Upload project featured image
   */
  private function uploadFeaturedImage(&$request, $id){

    $featured_image = $request->file('featured_image');

    $destinationPath = 'storage/projects_featured_images/';
    $extension = $featured_image->getClientOriginalExtension();



    $fileName = uniqid('img_'.$id.'_').'.'.$extension;

    $img = Image::make($featured_image);
    // resize the image to a width of 700 and constrain aspect ratio (auto height)
    $img->resize(700, null, function ($constraint) {
      $constraint->aspectRatio();
    });

    $img->save($destinationPath.$fileName);


    return($fileName);
  }
}
