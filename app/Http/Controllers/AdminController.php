<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Contracts\Pagination\Paginator;

use App\Http\Requests;

class AdminController extends Controller
{
  public function index()
  {

    return view('admin.edit')
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
   * Search users by
   * name
   * email
   */
  public function search(Request $request)
  {

    $query = $request->search;
    $param = $request->search_param;

    if($param == 'email'){

      $users = User::where('email', 'LIKE', '%'.$query.'%')->orderBy('created_at', 'desc')->paginate(5)->appends(['search' => $query, 'search_param' => $param]);

    }
    else{
      $users = User::where('name', 'LIKE', '%'.$query.'%')->orWhere('full_name', 'LIKE', '%'.$query.'%')->orderBy('created_at', 'desc')->paginate(5)->appends(['search' => $query, 'search_param' => $param]);
    }


    return view('admin.edit')
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
}
