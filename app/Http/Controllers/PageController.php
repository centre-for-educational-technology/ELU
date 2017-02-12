<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\PageRequest;

class PageController extends Controller
{
  public function index()
  {

//    $pages = Page::orderBy('created_at', 'desc')->get();

    $news = Page::where('permalink', 'LIKE', '%news%')->first();
    $info = Page::where('permalink', 'LIKE', '%info%')->first();


    return view('page.edit')
        ->with('news', $news)
        ->with('info', $info);

  }


  /**
   * Store pages info
   */
  public function store(PageRequest $request)
  {

    $news = Page::where('permalink', 'LIKE', '%news%')->first();
    $info = Page::where('permalink', 'LIKE', '%info%')->first();

    $news->body_et = $request->news_et;
    $news->body_en = $request->news_en;

    $info->body_et = $request->info_et;
    $info->body_en = $request->info_en;

    $news->save();
    $info->save();


    return \Redirect::to('/news-edit')
        ->with('message', 'Teated on uuendatud!')
        ->with('news', $news)
        ->with('info', $info);

  }
}
