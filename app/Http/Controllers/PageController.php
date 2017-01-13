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
    $faq = Page::where('permalink', 'LIKE', '%faq%')->first();
    $info = Page::where('permalink', 'LIKE', '%info%')->first();


    return view('page.edit')
        ->with('news', $news->body)
        ->with('faq', $faq->body)
        ->with('info', $info->body);

  }


  /**
   * Store pages info
   */
  public function store(PageRequest $request)
  {

    $news = Page::where('permalink', 'LIKE', '%news%')->first();
    $faq = Page::where('permalink', 'LIKE', '%faq%')->first();
    $info = Page::where('permalink', 'LIKE', '%info%')->first();

    $news->body = $request->news;
    $faq->body = $request->faq;
    $info->body = $request->info;




    $news->save();
    $faq->save();
    $info->save();



    return view('page.edit')
        ->with('news', $news->body)
        ->with('faq', $faq->body)
        ->with('info', $info->body)
        ->with('message', 'Lehed on muudatud!');





  }
}
