<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Project;

use App\Http\Requests;
use Illuminate\Support\Facades\File;

use App\Course;




File::requireOnce(config('services.simplesamlphp.basePath').'lib/_autoload.php');

use SimpleSAML_Auth_Simple;

class SimpleSamlController extends Controller
{


  public function redirectToProvider() {

    $authSAML = new SimpleSAML_Auth_Simple('default-sp');

    if ( !$authSAML->isAuthenticated() ) {
      $authSAML->requireAuth();
    } else {
      $attrs = $authSAML->getAttributes();


      $mail = $attrs['mail'][0];

      $user = User::where('email',$mail)->first();


      if(!$user){
        //Create new account
        $new_user = new User;
        $new_user->name = $attrs['uid'][0];
        $new_user->full_name = $attrs['cn'][0];
        $new_user->email = $attrs['mail'][0];
        $new_user->password = Hash::make('');

        $new_user->save();


        if(in_array('oppejoud', $attrs['eduPersonAffiliation'])){
          $new_user->roles()->attach(1);
        }

        if(in_array('student', $attrs['eduPersonAffiliation'])){
          $new_user->roles()->attach(2);


          $course_and_degree = $this->getCourseAndDegree($attrs);

          $course = Course::where('kood_htm', $course_and_degree['course_num'])->first();

          //Set user course and degree
          $new_user->courses()->attach($course->id, ['degree' => $course_and_degree['degree']]);

        }

        auth()->login($new_user, true);

      }else{

        //Update account
        $user->full_name = $attrs['cn'][0];
        $user->save();


        if(in_array('oppejoud', $attrs['eduPersonAffiliation'])){

          $user->roles()->syncWithoutDetaching([1]);

        }

        if(in_array('student', $attrs['eduPersonAffiliation'])){

          $user->roles()->syncWithoutDetaching([2]);

          $course_and_degree = $this->getCourseAndDegree($attrs);

          $course = Course::where('kood_htm', $course_and_degree['course_num'])->first();

          //Set user course and degree
          $user->courses()->updateExistingPivot($course->id, ['degree' => $course_and_degree['degree']]);

        }



        auth()->login($user, true);

      }


    }


    return redirect('/');

  }




  public function getCourseAndDegree($attrs){
    $course_num = null;
    $degree = null;

    foreach ($attrs['eduPersonScopedAffiliation'] as $item){

      if(strpos($item, 'student') !== false){

        $extracted = explode('.', explode('@', $item)[1])[0];

        if(is_numeric($extracted[0])){
          //Course number
          //\Debugbar::info('cou '.$extracted);

          $course_num = $extracted;

        }else{
          //Degree
          $degree = $extracted;
        }

      }
    }

    return array('course_num' => $course_num, 'degree' => $degree);
  }
}
