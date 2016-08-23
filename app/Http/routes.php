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
    Route::auth();

    Route::get('/', function () {
        return view('project.all', [
            'projects' => Project::orderBy('created_at', 'asc')->paginate(10)
        ]);
    });





});








Route::group(['middleware' =>['web']], function () {


    Route::get('/project/search', 'ProjectController@search');


    Route::group(['middleware' =>['auth']], function () {
        Route::get('/project', 'ProjectController@index');
        Route::get('/home', 'HomeController@index');



        Route::post('/project', 'ProjectController@store');


        Route::get('/project/{id}', function ($id) {

            return view('project.edit')
                ->with('current_project', Project::find($id))
                ->with('projects', Project::orderBy('created_at', 'asc')->get());

        });

        Route::post('/project/{id}', 'ProjectController@update');


//
//
//    Route::post('/project/{id}', function ($id) {
////        Project::findOrFail($id)->put();
//
//        return redirect('/')->with('message', 'Projekt on muudatud!');
//
//
//    });


        Route::delete('/project/{id}', function ($id) {
            Project::findOrFail($id)->delete();

            return redirect('/')->with('message', 'Projekt on kustutanud!');
        });
    });















//    Route::get('/project-new', function () {
//        return view('project-new', [
//            'projects' => Project::orderBy('created_at', 'asc')->get()
//        ]);
//    });


//    Route::post('/project-new', function () {
//        return redirect('/');
//
//    });


});
