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
use Illuminate\Http\Request;
use App\Page;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Course;
use App\Group;



Route::group(['middleware' =>['web']], function () {


    Route::group(['middleware' =>['auth']], function () {

      Route::get('profile', 'UserController@index');

      Route::post('profile/update-password', 'UserController@updatePassword');

      Route::post('profile/update-contact-email', 'UserController@updateContactEmail');




//    Teacher section
      Route::group(['middleware' =>['teacher']], function () {

        Route::get('project/new', 'ProjectController@add');

        Route::post('project/new', 'ProjectController@store');


        Route::delete('/project/{id}', function ($id) {
          $project = Project::findOrFail($id);

          $name = $project->name;
          $project->delete();

          return redirect('teacher/my-projects')->with('message', trans('project.project_deleted_notification', ['name' => $name]));
        });


        Route::get('/teacher/my-projects', function () {
          $projects = Project::whereHas('users', function ($q) {
            $q->where('participation_role', 'LIKE', '%author%')->where('id', Auth::user()->id);
          })->orderBy('created_at', 'desc')->paginate(5);


          return view('user.teacher.my_projects', [
              'projects' => $projects]);
        });

        Route::post('/project/{project}/unlink/{user}', 'ProjectController@unlinkMember');


      });


      //Teacher can do all these as well
      Route::group(['middleware' =>['project_moderator']], function ($id) {

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
	        if(\App::getLocale() == 'en'){
		        $courses = Course::select('id','oppekava_eng')->get();
	        }else{
		        $courses = Course::select('id','oppekava_est')->get();
	        }
	        
          

          $linked_courses = $current_project->getCourses()->select('id')->get();
	        $linked_courses_ids = array();
          foreach ($linked_courses as $linked_course){
            array_push($linked_courses_ids, $linked_course->id);
          }
	      
         




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

          return view('project.edit', compact('teachers','authors_ids', 'current_project', 'courses', 'projects', 'linked_courses_ids'));


        }));

        Route::post('/project/{id}', 'ProjectController@update');


        Route::post('project/{id}/add-group', 'ProjectController@addNewProjectGroup');


        Route::post('api/group/add-user', 'ProjectController@addUserToGroup');


        Route::delete('project/{id}/group/delete/{group_id}', 'ProjectController@deleteProjectGroup');


        Route::get('project/{id}/finish', 'ProjectController@finishProject');


        Route::post('project/{id}/finish', 'ProjectController@saveFinishedProject');


        Route::post('project/{id}/finish/uploadFiles', 'ProjectController@attachGroupGalleryImages');

        Route::post('project/{id}/finish/deleteFile', 'ProjectController@deleteFile');


        Route::get('project/{id}/api/group-images', 'ProjectController@getGroupImages');

      });




//    Admin section
      Route::group(['middleware' => ['admin']], function () {

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

        Route::get('admin/analytics/download', 'ProjectController@exportAnalyticsToCSV');

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
          $project->delete();

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


//        Route::post('leave/{id}', 'ProjectController@leaveProject');


        Route::get('student/project/new', function () {
         
	        if(\App::getLocale() == 'en'){
		        $courses = Course::select('id','oppekava_eng')->get();
	        }else{
		        $courses = Course::select('id','oppekava_est')->get();
	        }
	
	        return view('user.student.new_project')->with('courses', $courses);
        });

        Route::post('student/project/new', 'ProjectController@storeProjectByStudent');

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

    if(Auth::user()){
      return view('project.project')
          ->with('project', $project)
          ->with('isTeacher', Auth::user()->is('oppejoud'));
    }else{
      return view('project.project')
          ->with('project', $project)
          ->with('isTeacher', false);
    }


  }));


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

