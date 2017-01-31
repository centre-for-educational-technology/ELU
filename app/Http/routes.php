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



Route::group(['middleware' => ['web']], function () {


    Route::get('/login/tlu', 'SimpleSamlController@redirectToProvider');


    Route::get('/login/choose', function () {

      return view('auth.login_tlu');
    });


    Route::auth();



    Route::get('/', function () {
        return view('welcome', [
            'news' => Page::where('permalink', 'LIKE', '%news%')->first(),
            'faq' => Page::where('permalink', 'LIKE', '%faq%')->first(),
            'info' => Page::where('permalink', 'LIKE', '%info%')->first()]);
    });

    Route::get('/faq', function () {
        return view('page.faq', [
            'faq' => Page::where('permalink', 'LIKE', '%faq%')->first()]);
    });


    Route::get('/projects-all', 'ProjectController@index');


});



Route::group(['middleware' =>['web']], function () {


    Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);


    Route::get('/project/search', 'ProjectController@search');


    Route::group(['middleware' =>['auth']], function () {


//    Teacher section
      Route::group(['middleware' =>['teacher']], function () {

        Route::get('/project/new', 'ProjectController@add');

        Route::post('/project/new', 'ProjectController@store');


        Route::get('project/{id}', array('as' => 'project', function ($id) {


          $project = Project::find($id);


          if ($project->embedded != null) {
            preg_match('/src="([^"]+)"/', $project->embedded, $match);

            $project->embedded = $match[1];
          }


          $teachers = User::whereHas('roles', function ($q) {
            $q->where('name', 'oppejoud');
          })->get();


          $authors_id = array();

          $authors = array();

          foreach ($project->users as $user) {
            if ($user->pivot->participation_role == 'author') {
              array_push($authors_id, $user->id);
              array_push($authors, $user);
            }
          }

          foreach ($teachers as $key => $teacher) {
            if (in_array($teacher->id, $authors_id)) {
              unset($teachers[$key]);
            }
          }


          $projects = Project::whereHas('users', function ($q) {
            $q->where('participation_role', 'LIKE', '%author%')->where('id', Auth::user()->id);
          })->get();

          if ($project->start) {
            $project->start = date("m/d/Y", strtotime($project->start));
          }

          if ($project->end) {
            $project->end = date("m/d/Y", strtotime($project->end));
          }


          if ($project->join_deadline) {
            $project->join_deadline = date("m/d/Y", strtotime($project->join_deadline));
          }


          return view('project.edit')
              ->with('teachers', $teachers)
              ->with('authors', $authors)
              ->with('current_project', $project)
              ->with('projects', $projects);

        }));

        Route::post('/project/{id}', 'ProjectController@update');


        Route::delete('/project/{id}', function ($id) {
          $project = Project::findOrFail($id);

          $name = $project->name;
          $project->delete();

          return redirect('teacher/my-projects')->with('message', 'Projekt ' . $name . ' on kustutanud!');
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


//    Admin section
      Route::group(['middleware' => ['admin']], function () {

        Route::get('/admin/users', 'AdminController@index');

        Route::post('/admin/users/{id}/add-admin', 'AdminController@addAdmin');

        Route::post('/admin/users/{id}/remove-admin', 'AdminController@removeAdmin');


        Route::post('/admin/users/{id}/add-teacher', 'AdminController@addTeacher');

        Route::post('/admin/users/{id}/remove-teacher', 'AdminController@removeTeacher');


        Route::get('/admin/users/search', 'AdminController@search');


        Route::get('/pages', 'PageController@index');

        Route::post('/pages', 'PageController@store');

        Route::get('admin/all-projects/search', 'ProjectController@searchAll');


        Route::get('admin/all-projects', function () {


          $projects = Project::orderBy('created_at', 'desc')->paginate(10);


          return view('admin.all_projects', [
              'projects' => $projects]);
        });

        Route::delete('admin/all-projects/{id}', function ($id) {
          $project = Project::findOrFail($id);

          $name = $project->name;
          $project->delete();

          return redirect('admin/all-projects')->with('message', 'Projekt ' . $name . ' on kustutanud!');
        });


        Route::get('admin/student-projects', function () {


          $projects = Project::where('submitted_by_student', true)->orderBy('created_at', 'desc')->paginate(10);


          return view('admin.student_projects', [
              'projects' => $projects]);
        });

        Route::group(['middleware' => ['superadmin']], function () {

          //Activity log summary
          Route::get('admin/log', 'AdminController@getActivityLogItems');
        });


      });


//    Student section
      Route::group(['middleware' => ['student']], function () {

        Route::get('student/my-projects', array('as' => 'student/my-projects', function () {
          $projects = Project::whereHas('users', function ($q) {
            $q->where('participation_role', 'LIKE', '%member%')->where('id', Auth::user()->id);
          })->where('publishing_status', 1)->orderBy('created_at', 'desc')->paginate(5);


          return view('user.student.my_projects', [
              'projects' => $projects]);
        }));

        Route::post('join/{id}', 'ProjectController@joinProject');


        Route::post('leave/{id}', 'ProjectController@leaveProject');


        Route::get('student/project/new', function () {

          return view('user.student.new_project');
        });

        Route::post('student/project/new', 'ProjectController@storeProjectByStudent');

      });

    });


});
