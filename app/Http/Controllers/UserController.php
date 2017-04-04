<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ChangeUserPasswordRequest;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Http\Requests\ChangeUserContactEmailRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return view('user.profile')->with('user', Auth::user());
    }




    public function updatePassword(ChangeUserPasswordRequest $request){

      $request_data = $request->All();


      $current_password = Auth::user()->password;
      if(Hash::check($request_data['current_password'], $current_password))
      {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $user->password = Hash::make($request_data['password']);;
        $user->save();



        return \Redirect::to('profile')
            ->with('message', trans('user.password_changed'))
            ->with('user', Auth::user());
      }
      else
      {
        return \Redirect::to('profile')
            ->with('error', trans('user.wrong_current_password'))
            ->with('user', Auth::user());

      }



    }


    public function updateContactEmail(ChangeUserContactEmailRequest $request){
      $user_id = Auth::user()->id;
      $user = User::find($user_id);

      $user->contact_email = $request->email;

      $user->save();

      return \Redirect::to('profile')
          ->with('message', trans('user.contact_email_changed'))
          ->with('user', Auth::user());

    }


}
