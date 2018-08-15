<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

use App\Project;
use App\NewProject;
use App\OutsideProject;
use Illuminate\Http\Request;
use App\Page;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Course;
use App\Group;
use App\EvaluationDate;
use App\Tag;



Route::group(['middleware' =>['web']], function () {

  
    Route::group(['middleware' =>['auth']], function () {

      Route::get('profile', 'UserController@index');

      Route::post('profile/update-password', 'UserController@updatePassword');

      Route::post('profile/update-contact-email', 'UserController@updateContactEmail');



//    Teacher section
      Route::group(['middleware' =>['teacher']], function () {

        Route::get('project/new', 'ProjectController@add');

        Route::post('project/new', 'ProjectController@store');


        Route::delete('/project/{id}/delete', function ($id) {
          $project = Project::findOrFail($id);

          $name = $project->name;
          // $project->delete();
          $project->deleted = 1;
          $project->save();

          return redirect('teacher/my-projects')->with('message', trans('project.project_deleted_notification', ['name' => $name]));
        });

        Route::delete('/new-project/{id}/delete', function ($id) {
          $project = NewProject::findOrFail($id);

          $name = $project->name;
          // $project->delete();
          $project->deleted = 1;
          $project->save();

          return redirect('teacher/my-projects')->with('message', trans('project.project_deleted_notification', ['name' => $name]));
        });


        Route::get('/teacher/my-projects', function () {
          $projects = Project::where('deleted', NULL)->whereHas('users', function ($q) {
            $q->where('participation_role', 'LIKE', '%author%')->where('id', Auth::user()->id);
          })->orderBy('created_at', 'desc')->paginate(5);
          $new_projects = NewProject::where('deleted', NULL)->whereHas('users', function ($q) {
            $q->where('participation_role', 'LIKE', '%author%')->where('id', Auth::user()->id);
          })->orderBy('created_at', 'desc')->paginate(5);


          return view('user.teacher.my_projects', [
              'projects' => $projects,
              'new_projects' => $new_projects]);
        });

        Route::post('/project/{project}/unlink/{user}', 'ProjectController@unlinkMember');

	      Route::get('/project/{id}/calculate-load', 'ProjectController@getSupervisorsLoadForProject');

	      Route::post('api/calculate-load/set', 'ProjectController@setSupervisorsLoadForProject');


      });


      //Teacher can do all these as well
      Route::group(['middleware' =>['project_moderator']], function ($id) {

        Route::get('new-project/{id}/edit', array('as' => 'project_edit', function ($id) {


          $current_project = NewProject::find($id);


          if ($current_project->featured_video_link != null) {
            preg_match('/src="([^"]+)"/', $current_project->featured_video_link, $match);
            $current_project->featured_video_link = $match[1];
          }


          //Supervisors field
          $teachers = User::select('id','name', 'full_name')->whereHas('roles', function ($q) {
            $q->where('name', 'oppejoud');
          })->get();


          $authors = $current_project->users()->select('id')->wherePivot('participation_role', 'author')->get();
	        $authors_ids = array();
	        foreach ($authors as $author){
	        	array_push($authors_ids, $author->id);
	        }

          $projects = NewProject::whereHas('users', function ($q) {
            $q->where('participation_role', 'LIKE', '%author%')->where('id', Auth::user()->id);
          })->get();

          return view('project.new_edit', compact('teachers', 'current_project', 'projects'));


        }));

        Route::get('project/{id}/edit', array('as' => 'project_edit', function ($id) {


          $current_project = Project::find($id);


          if ($current_project->embedded != null) {
            preg_match('/src="([^"]+)"/', $current_project->embedded, $match);

            $current_project->embedded = $match[1];
          }


          //Supervisors field
          $teachers = User::select('id','name', 'full_name')->whereHas('roles', function ($q) {
            $q->where('name', 'oppejoud');
          })->get();

          $authors = $current_project->users()->select('id')->wherePivot('participation_role', 'author')->get();
	        $authors_ids = array();
	        foreach ($authors as $author){
	        	array_push($authors_ids, $author->id);
	        }


          //Study areas field
//	        if(\App::getLocale() == 'en'){
//		        $courses = Course::select('id','oppekava_eng')->get();
//	        }else{
//		        $courses = Course::select('id','oppekava_est')->get();
//	        }
//


          $linked_courses = $current_project->getCourses()->select('id')->get();
	        $linked_courses_ids = array();
          foreach ($linked_courses as $linked_course){
            array_push($linked_courses_ids, $linked_course->id);
          }



	        $evaluation_dates = EvaluationDate::orderBy('id', 'desc')->take(3)->get();



          $projects = Project::whereHas('users', function ($q) {
            $q->where('participation_role', 'LIKE', '%author%')->where('id', Auth::user()->id);
          })->get();

//          if ($project->start) {
//            $project->start = date("m/d/Y", strtotime($project->start));
//          }
//
//          if ($project->end) {
//            $project->end = date("m/d/Y", strtotime($project->end));
//          }


          if ($current_project->join_deadline) {
            $current_project->join_deadline = date("m/d/Y", strtotime($current_project->join_deadline));
          }

          return view('project.edit', compact('teachers','authors_ids', 'current_project', 'projects', 'linked_courses_ids', 'evaluation_dates'));


        }));

        Route::post('/project/{id}', 'ProjectController@update');


        Route::post('project/{id}/add-group', 'ProjectController@addNewProjectGroup');


        Route::post('api/group/add-user', 'ProjectController@addUserToGroup');

	      Route::post('api/group/rename', 'ProjectController@renameProjectGroup');

        Route::delete('project/{id}/group/delete/{group_id}', 'ProjectController@deleteProjectGroup');


        Route::get('project/{id}/finish', 'ProjectController@finishProject');


        Route::post('project/{id}/finish', 'ProjectController@saveFinishedProject');

        Route::post('project/{id}/finishv2', 'ProjectController@saveFinishedProjectv2');


        Route::post('project/{id}/finish/uploadFiles', 'ProjectController@attachGroupGalleryImages');

        Route::post('project/{id}/finish/uploadPoster', 'ProjectController@attachGroupPresentation');

        Route::post('project/{id}/finish/uploadMaterials', 'ProjectController@attachGroupMaterials');

        Route::post('project/{id}/finish/deleteFile', 'ProjectController@deleteFile');

        Route::post('project/{id}/finish/deletePoster', 'ProjectController@deletePoster');

        Route::post('project/{id}/finish/deleteMaterials', 'ProjectController@deleteMaterial');


        Route::get('project/{id}/api/group-Poster', 'ProjectController@getGroupPoster');

        Route::get('project/{id}/api/group-Materials', 'ProjectController@getGroupMaterials');

      });




//    Admin section
      Route::group(['middleware' => ['admin']], function () {

        Route::get('folders', 'ProjectController@makeFolders');

        Route::get('/admin/users', 'AdminController@index');

        Route::post('/admin/users/{id}/add-admin', 'AdminController@addAdmin');

        Route::post('/admin/users/{id}/remove-admin', 'AdminController@removeAdmin');


        Route::post('/admin/users/{id}/add-teacher', 'AdminController@addTeacher');

        Route::post('/admin/users/{id}/remove-teacher', 'AdminController@removeTeacher');

        Route::post('/admin/users/{id}/add-project-moderator', 'AdminController@addProjectModerator');

        Route::post('/admin/users/{id}/remove-project-moderator', 'AdminController@removeProjectModerator');


        Route::get('/admin/users/search', 'AdminController@search');


        Route::get('/news/edit', 'PageController@editNews');

        Route::post('/news/edit', 'PageController@storeNews');

        Route::get('/faq/edit', 'PageController@editFaq');

        Route::post('/faq/edit', 'PageController@storeFaq');

        Route::get('admin/all-projects/search', 'ProjectController@getAllProjectsSearch');

        Route::get('admin/analytics', 'ProjectController@indexAnalytics');

        Route::get('admin/analytics/search', 'ProjectController@getAdminAnalyticsListing');

        Route::get('admin/analytics/download/open', 'ProjectController@exportAnalyticsToCSVOpenProjects');

	      Route::get('admin/analytics/download/ongoing', 'ProjectController@exportAnalyticsToCSVOngoingProjects');

	      Route::get('admin/analytics/download/finished', 'ProjectController@exportAnalyticsToCSVFinishedProjects');

	      Route::get('admin/analytics/download/students/ongoing', 'ProjectController@exportAnalyticsToCSVStudentsOngoingProjects');

	      Route::get('admin/analytics/download/teachers/ongoing/load', 'ProjectController@exportAnalyticsToCSVOngoingProjectsTeachersLoad');


	      Route::get('admin/evaluation-dates', 'AdminController@indexEvaluationDates');

	      Route::post('admin/evaluation-dates', 'AdminController@editEvaluationDates');

//        Attach user to project api for ajax
        Route::post('api/search/user', 'ProjectController@searchUser');

        Route::post('project/{id}/attach-users', 'ProjectController@attachUsersToProject');


        Route::get('admin/all-projects', function () {


          $projects = Project::orderBy('created_at', 'desc')->paginate(10);


          return view('admin.all_projects', [
              'projects' => $projects]);
        });

        Route::delete('admin/all-projects/{id}/delete', function ($id) {
          $project = Project::findOrFail($id);

          $name = $project->name;
          // $project->delete();
          $project->deleted = 1;
          $project->save();

          return redirect('admin/all-projects')->with('message', trans('project.project_deleted_notification', ['name' => $name]));
        });

        Route::delete('admin/new-projects/{id}/delete', function ($id) {
          $project = NewProject::findOrFail($id);

          $name = $project->name;
          // $project->delete();
          $project->deleted = 1;
          $project->save();

          return redirect('admin/all-projects')->with('message', trans('project.project_deleted_notification', ['name' => $name]));
        });


        Route::get('admin/student-projects', function () {


          $projects = Project::where('submitted_by_student', true)->orderBy('created_at', 'desc')->paginate(10);


          return view('admin.student_projects', [
              'projects' => $projects]);
        });

        Route::group(['middleware' => ['superadmin']], function () {

          //Activity log summary
          Route::get('admin/log', 'AdminController@getActivityLogItems');


	        //Update courses
	        Route::get('admin/courses/update', function () {
		        return view('admin.update_courses');
	        });

	        Route::post('admin/courses/update', 'AdminController@updateCourses');

        });


      });


//    Student section
      Route::group(['middleware' => ['student']], function () {

        Route::post('finish/{id}/finish/uploadPoster', 'ProjectController@attachGroupPresentation');

        Route::post('finish/{id}/finish/uploadMaterials', 'ProjectController@attachGroupMaterials');

        Route::post('finish/{id}/finish/deletePoster', 'ProjectController@deletePoster');

        Route::post('finish/{id}/finish/deleteMaterials', 'ProjectController@deleteMaterial');


        Route::get('finish/{id}/api/group-Poster', 'ProjectController@getGroupPoster');

        Route::get('finish/{id}/api/group-Materials', 'ProjectController@getGroupMaterials');

        Route::get('finish/{id}', 'ProjectController@finishProject');

        Route::post('finishv2/{id}', 'ProjectController@saveFinishedProjectv2');

//        Route::get('student/my-projects', array('as' => 'student/my-projects', function () {
//          $projects = Project::whereHas('users', function ($q) {
//            $q->where('participation_role', 'LIKE', '%member%')->where('id', Auth::user()->id);
//          })->where('publishing_status', 1)->orderBy('created_at', 'desc')->paginate(5);
//
//
//          return view('user.student.my_projects', [
//              'projects' => $projects]);
//        }));

        Route::post('join/{id}', 'ProjectController@joinProject');


        Route::post('leave/{id}', 'ProjectController@leaveProject');


        Route::get('student/project/new', function () {

//	        if(\App::getLocale() == 'en'){
//		        $courses = Course::select('id','oppekava_eng')->get();
//	        }else{
//		        $courses = Course::select('id','oppekava_est')->get();
//	        }
//
//          return view('user.project.new');

            $teachers = User::select('id','name', 'full_name')->whereHas('roles', function($q)
            {
              $q->where('name', 'oppejoud');
            })->get();

            $projects = Project::where('deleted', NULL)->whereHas('users', function($q)
            {
              $q->where('id', Auth::user()->id);
            })->get();

            $evaluation_dates = EvaluationDate::orderBy('id', 'desc')->take(3)->get();

            $author =  Auth::user()->id;

            return view('project.new', compact('teachers', 'author', 'projects', 'evaluation_dates', 'project_language'));
        });

        Route::post('student/project/new', 'ProjectController@storeNewProjectByStudent');

      });

    });


});



Route::group(['middleware' => ['web']], function () {


  Route::get('/login/tlu', 'SimpleSamlController@redirectToProvider');


  Route::get('/login/choose', function () {

    return view('auth.login_tlu');
  });


  Route::auth();




  Route::get('/', 'PageController@index');


  Route::get('/faq', 'PageController@indexFaq');



  Route::get('/projects/open', 'ProjectController@indexOpenProjects');

  Route::get('/projects/ongoing', 'ProjectController@indexOngoingProjects');

  Route::get('/projects/finished', 'ProjectController@indexFinishedProjects');


  Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);


  Route::get('/projects/open/search', 'ProjectController@getOpenProjectsSearch');

  Route::get('/projects/ongoing/search', 'ProjectController@getOngoingProjectsSearch');

  Route::get('/projects/finished/search', 'ProjectController@getFinishedProjectsSearch');



  Route::get('project/{id}', array('as' => 'project', function ($id) {


    $project = Project::find($id);

    if($project){
	    if(Auth::user()){
		    return view('project.project')
				    ->with('project', $project)
				    ->with('isTeacher', Auth::user()->is('oppejoud'));
	    }else{
		    return view('project.project')
				    ->with('project', $project)
				    ->with('isTeacher', false);
	    }

    }else{
    	return view('errors.404');
    }




  }));

  Route::get('project/new/outside', function () {
    return view('project.new_outside_idea');
  });

  Route::post('/project/new/outside', 'ProjectController@storeOutside');

  Route::get('outside-project/{view_hash}', array('as' => 'project', function ($view_hash) {
    $project = OutsideProject::where('view_hash', $view_hash)->first();
    return view('project.view_outside_idea')
      ->with('project', $project);
  }));


  Route::get('new-project/{id}', array('as' => 'project', function ($id) {


    $project = NewProject::find($id);

    if($project){
	    if(Auth::user()){
		    return view('project.project')
				    ->with('project', $project)
				    ->with('isTeacher', Auth::user()->is('oppejoud'));
	    }else{
		    return view('project.project')
				    ->with('project', $project)
				    ->with('isTeacher', false);
	    }

    }else{
    	return view('errors.404');
    }

  }));


  Route::get('all_tags', function () {
    $tags['en'] = [];
    $tags['et'] = [];
    $tags_data = Tag::all();
    foreach ($tags_data as $tag_data) {
      if ($tag_data['language'] == 'en') {
        array_push($tags['en'], $tag_data['tag']);
      } elseif ($tag_data['language'] == 'et') {
        array_push($tags['et'], $tag_data['tag']);
      }
    }
    return $tags;
  });

  Route::post('api/teachers/get', function () {
    $teachers = User::select('id','name', 'full_name')->whereHas('roles', function($q)
    {
      $q->where('name', 'oppejoud');
    })->get();
    return $teachers;
  });


  // ===============================================
  // 404 ===========================================
  // ===============================================

//    App::missing(function($exception)
//    {
//
//      // shows an error page (app/views/error.blade.php)
//      // returns a page not found error
//      return Response::view('error', array(), 404);
//    });


});
