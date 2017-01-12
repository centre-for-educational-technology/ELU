<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
  public function index()
  {

    return view('admin.edit')
        ->with('users', User::orderBy('created_at', 'desc')->paginate(10));

  }


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



  public function removeAdmin(Request $request, $id){



    $user = User::find($id);

    $user->roles()->detach(3);

    if($user->full_name){
      $username = $user->full_name;
    }else{
      $username = $user->name;
    }


    return \Redirect::to('admin/users')
        ->with('users', User::orderBy('created_at', 'desc')->paginate(10))
        ->with('message', $username.' on ära võetud adminide nimekirjast!');


  }



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
}
