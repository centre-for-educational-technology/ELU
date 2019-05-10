<?php

namespace App\Http\Controllers;

use App\Course;
use App\User;
use Illuminate\Http\Request;
use function Sodium\compare;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Contracts\Pagination\Paginator;
use App\Project;

use App\Http\Requests;
use App\Http\Requests\UpdateCoursesRequest;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
  public function index()
  {

    return view('admin.users')
        ->with('users', User::orderBy('created_at', 'desc')->paginate(10));

  }


  /**
   * Add admin role to user
   */
  public function addAdmin(Request $request, $id){



    $user = User::find($id);

    $user->roles()->attach(3);

    if($user->full_name){
      $username = $user->full_name;
    }else{
      $username = $user->name;
    }


    return \Redirect::to('admin/users')
        ->with('users', User::orderBy('created_at', 'desc')->paginate(10))
        ->with('message', $username.' on lisatud adminide nimekirja!');

  }



  /**
   * Remove admin role from user
   */
  public function removeAdmin(Request $request, $id){


    $user = User::find($id);

    if(!$user->is('superadmin')){
      $user->roles()->detach(3);

      if($user->full_name){
        $username = $user->full_name;
      }else{
        $username = $user->name;
      }


      return \Redirect::to('admin/users')
          ->with('users', User::orderBy('created_at', 'desc')->paginate(10))
          ->with('message', $username.' on ära võetud adminide nimekirjast!');
    } else {
      return \Redirect::to('admin/users')
          ->with('users', User::orderBy('created_at', 'desc')->paginate(10))
          ->with('message', $user->email.' on ELU arendaja, teda ei saa kustutada adminide nimekirjast!');
    }




  }



  /**
   * Add teacher role to user
   */
  public function addTeacher(Request $request, $id){



    $user = User::find($id);

    $user->roles()->attach(1);


    if($user->full_name){
      $username = $user->full_name;
    }else{
      $username = $user->name;
    }


    return \Redirect::to('admin/users')
        ->with('users', User::orderBy('created_at', 'desc')->paginate(10))
        ->with('message', $username.' on lisatud õppejõudu nimekirja!');

  }



  /**
   * Remove teacher role from user
   */
  public function removeTeacher(Request $request, $id){


    $user = User::find($id);

    $user->roles()->detach(1);

    if($user->full_name){
      $username = $user->full_name;
    }else{
      $username = $user->name;
    }


    return \Redirect::to('admin/users')
        ->with('users', User::orderBy('created_at', 'desc')->paginate(10))
        ->with('message', $username.' on ära võetud õppejõudu nimekirjast!');


  }


  /**
   * Add project moderator role to user
   */
  public function addProjectModerator(Request $request, $id){



    $user = User::find($id);

    $user->roles()->attach(5);


    if($user->full_name){
      $username = $user->full_name;
    }else{
      $username = $user->name;
    }


    return \Redirect::to('admin/users')
        ->with('users', User::orderBy('created_at', 'desc')->paginate(10))
        ->with('message', $username.' on lisatud projektihaldurite nimekirja!');

  }



  /**
   * Remove teacher role from user
   */
  public function removeProjectModerator(Request $request, $id){


    $user = User::find($id);

    $user->roles()->detach(5);

    if($user->full_name){
      $username = $user->full_name;
    }else{
      $username = $user->name;
    }


    return \Redirect::to('admin/users')
        ->with('users', User::orderBy('created_at', 'desc')->paginate(10))
        ->with('message', $username.' on ära võetud projektihaldurite nimekirjast!');


  }


  /**
   * Search users by
   * name
   * email
   */
  public function search(Request $request)
  {

    $query = $request->search;
    $param = $request->search_param;

    if($param == 'email'){

      $users = User::where('email', 'LIKE', '%'.$query.'%')->orWhere('contact_email', 'LIKE', '%'.$query.'%')->orderBy('created_at', 'desc')->paginate(5)->appends(['search' => $query, 'search_param' => $param]);

    }
    else{
      $users = User::where('name', 'LIKE', '%'.$query.'%')->orWhere('full_name', 'LIKE', '%'.$query.'%')->orderBy('created_at', 'desc')->paginate(5)->appends(['search' => $query, 'search_param' => $param]);
    }


    return view('admin.users')
        ->with('name', $query)
        ->with('param', $param)
        ->with('users', $users);
  }


  /**
   * Get activity log summary
   * Integrates spatie/blender
   */
  public function getActivityLogItems(){

    $logItems = $this->getPaginatedActivityLogItems();
    return view('admin.activity_log')->with(compact('logItems'));

  }


  protected function getPaginatedActivityLogItems(): Paginator
  {
    return Activity::with('causer')
        ->orderBy('created_at', 'DESC')
        ->paginate(50);
  }
  
  
  
  public function updateCourses(UpdateCoursesRequest $request){
	
	  $courses_csv = $request->file('courses_csv');
	  $new_courses_count = 0;
	  $updated_courses_count = 0;
	  
	  $results = array();
	
	  $data = Excel::load($courses_csv, function($reader) {
	  })->get();
	
	  if(!empty($data) && $data->count()){
		  foreach ($data as $key => $value) {
			  array_push($results, ['kood_tlu' => $value->kood_tlu, 'kood_htm' => $value->kood_htm, 'oppekava_est' => $value->oppekava_est, 'oppekava_eng' => $value->oppekava_eng, 'tase' => $value->tase]);
			
			  $course = Course::where('kood_htm', $value->kood_htm)->first();
			  if($course){
				  $course->kood_tlu = $value->kood_tlu;
				  $course->oppekava_est = $value->oppekava_est;
				  $course->oppekava_eng = $value->oppekava_eng;
				  $course->tase = $value->tase;
				  $course->save();
				  $updated_courses_count++;
			  }else{
				  $new_course = new Course;
				  $new_course->kood_tlu = $value->kood_tlu;
				  $new_course->kood_htm = $value->kood_htm;
				  $new_course->oppekava_est = $value->oppekava_est;
				  $new_course->oppekava_eng = $value->oppekava_eng;
				  $new_course->tase = $value->tase;
				  $new_course->save();
				  $new_courses_count++;
			  }
		  }
		 
	  }
	  
	  

	  return view('admin.update_courses')
			  ->with('results', $results)
			  ->with('new_courses_count', $new_courses_count)
	      ->with('updated_courses_count', $updated_courses_count);
  }
  
  
  
}
