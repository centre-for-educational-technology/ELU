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



    return \Redirect::to('admin/edit')
        ->with('users', User::orderBy('created_at', 'desc')->paginate(10))
        ->with('message', $user->name.' on lisatud adminide nimekirja!');

  }



  public function removeAdmin(Request $request, $id){



    $user = User::find($id);

    $user->roles()->detach(3);


    return \Redirect::to('admin/edit')
        ->with('users', User::orderBy('created_at', 'desc')->paginate(10))
        ->with('message', $user->name.' on ära võetud adminide nimekirjast!');


  }



  public function addTeacher(Request $request, $id){



    $user = User::find($id);

    $user->roles()->attach(1);



    return \Redirect::to('admin/edit')
        ->with('users', User::orderBy('created_at', 'desc')->paginate(10))
        ->with('message', $user->name.' on lisatud õppejõudu nimekirja!');

  }



  public function removeTeacher(Request $request, $id){



    $user = User::find($id);

    $user->roles()->detach(1);


    return \Redirect::to('admin/edit')
        ->with('users', User::orderBy('created_at', 'desc')->paginate(10))
        ->with('message', $user->name.' on ära võetud õppejõudu nimekirjast!');


  }
}
