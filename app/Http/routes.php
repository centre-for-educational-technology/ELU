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

Route::group(['middleware' => ['web']], function () {
    Route::get('/', function () {
        return view('projects-all', [
            'projects' => Project::orderBy('created_at', 'asc')->get()
        ]);
    });

});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');


    Route::get('/project-new', 'ProjectController@index');

//    /**
//     * Show Task Dashboard
//     */
//    Route::get('/project-new', function () {
//        return view('project-new', [
//            'projects' => Project::orderBy('created_at', 'asc')->get()
//        ]);
//    });

    /**
     * Add New Task
     */
//    Route::post('/project-new', function () {
//        return redirect('/');
//
//    });

    Route::post('/project-new', 'ProjectController@store');


    /**
     * Delete Task
     */
    Route::delete('/project-new/{id}', function ($id) {
        Project::findOrFail($id)->delete();

        return redirect('/');
    });
});
