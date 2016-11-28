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






Route::group(['middleware' => ['web']], function () {


    Route::get('/login/tlu', 'SimpleSamlController@redirectToProvider');


    Route::auth();






    Route::get('/', function () {
        return view('welcome', [
            'projects' => Project::orderBy('created_at', 'desc')->take(5)->get(),
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


    Route::get('/project/search', 'ProjectController@search');


    Route::group(['middleware' =>['auth']], function () {
        Route::get('/project', 'ProjectController@add');
        Route::get('/home', 'HomeController@index');



        Route::post('/project', 'ProjectController@store');


        Route::get('/project/{id}', function ($id) {

            $project = Project::find($id);

            if($project->embedded != null){
                preg_match('/src="([^"]+)"/', $project->embedded, $match);

                $project->embedded = $match[1];
            }




            return view('project.edit')
                ->with('current_project', $project)
                ->with('projects', Project::orderBy('created_at', 'desc')->get());

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




        Route::get('/pages', 'PageController@index');


        Route::post('/pages', 'PageController@store');




        Route::get('/admin/edit', 'AdminController@index');

        Route::post('/admin/edit/{id}/add', 'AdminController@update');

        Route::post('/admin/edit/{id}/remove', 'AdminController@remove');

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
