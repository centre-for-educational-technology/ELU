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


  public function update(Request $request, $id){



    $user = User::find($id);

    $user->roles()->attach(3);


    return view('admin.edit')
        ->with('users', User::orderBy('created_at', 'desc')->paginate(10))
        ->with('message', $user->name.' on lisatud adminisse!');


  }
}
