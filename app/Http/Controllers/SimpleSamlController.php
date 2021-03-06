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
        $new_user->id_code = $attrs['PersonalIDCode'][0];

        $new_user->save();


        if(!empty($attrs['eduPersonAffiliation'])){
          if(in_array('oppejoud', $attrs['eduPersonAffiliation'])){
            $new_user->roles()->attach(1);
          }

          else if(in_array('student', $attrs['eduPersonAffiliation'])){
            $new_user->roles()->attach(2);

            if (isset($attrs['tluStudentID'])) {
                if (count($attrs['tluStudentID']) > 0) {
                  $tluStudentIdString = "[";
                  for ($i=0;$i<count($attrs['tluStudentID']);$i++) {
                    $tluStudentIdString .= "{\"".$i."\":\"".$attrs['tluStudentID'][$i]."\"}";
                    if ($i != count($attrs['tluStudentID'])-1) {
                      $tluStudentIdString .= ",";
                    }
                  }
                  $tluStudentIdString .= "]";
                  $new_user->tlu_student_id = $tluStudentIdString;
                }
              }
              
              if (count($attrs['tluStudy']) > 0) {
                $tluStudyString = "[";
                for ($i=0;$i<count($attrs['tluStudy']);$i++) {
                  $tluStudyString .= "{\"".$i."\":\"".$attrs['tluStudy'][$i]."\"}";
                  if ($i != count($attrs['tluStudy'])-1) {
                    $tluStudyString .= ",";
                  }
                }
                $tluStudyString .= "]";
                $new_user->tlu_study = $tluStudyString;
              }

              $new_user->save();


            if(!empty($attrs['eduPersonScopedAffiliation'])){
              $course_and_degree = $this->getCourseAndDegree($attrs);


              if($course_and_degree['course_num'] != false){
                $course = Course::where('kood_htm', $course_and_degree['course_num'])->first();

                //Set user course and degree
                $new_user->courses()->attach($course->id, ['degree' => $course_and_degree['degree']]);
              }

            }

          }else{
            //Staff gets student role
            $new_user->roles()->attach(2);
          }
        }else{
          //Unknown user gets student role by default
          $new_user->roles()->attach(2);
        }


        auth()->login($new_user);
	
	      if($new_user->is('student')){
		      if(empty($user->contact_email)){
			      return redirect('/profile#contact-email-form');
		      }
		
	      }

      }else{

        //Update account
        $user->full_name = $attrs['cn'][0];
        $user->id_code = $attrs['PersonalIDCode'][0];
        $user->save();


        if(!empty($attrs['eduPersonAffiliation'])){
          if(in_array('oppejoud', $attrs['eduPersonAffiliation'])){

            $user->roles()->syncWithoutDetaching([1]);

          }else if(in_array('student', $attrs['eduPersonAffiliation'])){

            if (isset($attrs['tluStudentID'])) {
              if (count($attrs['tluStudentID']) > 0) {
                $tluStudentIdString = "[";
                for ($i=0;$i<count($attrs['tluStudentID']);$i++) {
                  $tluStudentIdString .= "{\"".$i."\":\"".$attrs['tluStudentID'][$i]."\"}";
                  if ($i != count($attrs['tluStudentID'])-1) {
                    $tluStudentIdString .= ",";
                  }
                }
                $tluStudentIdString .= "]";
                $user->tlu_student_id = $tluStudentIdString;
              }
            }
            
            if (count($attrs['tluStudy']) > 0) {
              $tluStudyString = "[";
              for ($i=0;$i<count($attrs['tluStudy']);$i++) {
                $tluStudyString .= "{\"".$i."\":\"".$attrs['tluStudy'][$i]."\"}";
                if ($i != count($attrs['tluStudy'])-1) {
                  $tluStudyString .= ",";
                }
              }
              $tluStudyString .= "]";
              $user->tlu_study = $tluStudyString;
            }

            $user->save();

            $user->roles()->syncWithoutDetaching([2]);


            if(!empty($attrs['eduPersonScopedAffiliation'])){
              $course_and_degree = $this->getCourseAndDegree($attrs);

              if($course_and_degree['course_num'] != false){
                $course = Course::where('kood_htm', $course_and_degree['course_num'])->first();

                //Set user course and degree and delete previous ones
                $user->courses()->sync([$course->id => ['degree' => $course_and_degree['degree']]]);
               
              }

            }

          }else{
            //Staff gets student role
            $user->roles()->syncWithoutDetaching([2]);

          }
        }else{
          //Unknown user gets student role by default
          $user->roles()->sync([2]);
        }

        auth()->login($user);
	
	      if($user->is('student')){
		      if(empty($user->contact_email)){
			      return redirect('/profile#contact-email-form');
		      }
		
	      }

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
