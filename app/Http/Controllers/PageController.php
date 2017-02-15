<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\StoreNewsPageRequest;
use App\Http\Requests\StoreFaqPageRequest;

class PageController extends Controller
{


  public function index()
  {

    $news = Page::where('permalink', 'LIKE', '%news%')->first();
    $info = Page::where('permalink', 'LIKE', '%info%')->first();
    $fair_info = Page::where('permalink', 'LIKE', '%fair_info%')->first();

    $what = Page::where('permalink', 'LIKE', '%what%')->first();
    $why = Page::where('permalink', 'LIKE', '%why%')->first();
    $when = Page::where('permalink', 'LIKE', '%when%')->first();
    $with_who = Page::where('permalink', 'LIKE', '%with_who%')->first();
    $how = Page::where('permalink', 'LIKE', '%how%')->first();
    $which = Page::where('permalink', 'LIKE', '%which%')->first();


    return view('welcome', compact('news', 'fair_info', 'info', 'what', 'why', 'when', 'with_who', 'how', 'which'));


  }



  public function indexFaq()
  {

    $what = Page::where('permalink', 'LIKE', '%what%')->first();
    $why = Page::where('permalink', 'LIKE', '%why%')->first();
    $when = Page::where('permalink', 'LIKE', '%when%')->first();
    $with_who = Page::where('permalink', 'LIKE', '%with_who%')->first();
    $how = Page::where('permalink', 'LIKE', '%how%')->first();
    $which = Page::where('permalink', 'LIKE', '%which%')->first();


    return view('page.faq', compact('what', 'why', 'when', 'with_who', 'how', 'which'));


  }



  public function editNews()
  {

//    $pages = Page::orderBy('created_at', 'desc')->get();

    $news = Page::where('permalink', 'LIKE', '%news%')->first();
    $info = Page::where('permalink', 'LIKE', '%info%')->first();
    $fair_info = Page::where('permalink', 'LIKE', '%fair_info%')->first();


    return view('page.edit.news', compact('news', 'info', 'fair_info'));

  }


  public function editFaq()
  {

//    $pages = Page::orderBy('created_at', 'desc')->get();

    $what = Page::where('permalink', 'LIKE', '%what%')->first();
    $why = Page::where('permalink', 'LIKE', '%why%')->first();
    $when = Page::where('permalink', 'LIKE', '%when%')->first();
    $with_who = Page::where('permalink', 'LIKE', '%with_who%')->first();
    $how = Page::where('permalink', 'LIKE', '%how%')->first();
    $which = Page::where('permalink', 'LIKE', '%which%')->first();


    return view('page.edit.faq', compact('what', 'why', 'when', 'with_who', 'how', 'which'));


  }


  /**
   * Store news
   */
  public function storeNews(StoreNewsPageRequest $request)
  {

    $news = Page::where('permalink', 'LIKE', '%news%')->first();
    $info = Page::where('permalink', 'LIKE', '%info%')->first();
    $fair_info = Page::where('permalink', 'LIKE', '%fair_info%')->first();

    $news->body_et = $request->news_et;
    $news->body_en = $request->news_en;

    $info->body_et = $request->info_et;
    $info->body_en = $request->info_en;

    $fair_info->body_et = $request->fair_info_et;
    $fair_info->body_en = $request->fair_info_en;

    $news->save();
    $info->save();
    $fair_info->save();


    return \Redirect::to('/news/edit')
        ->with('message', 'Teated on uuendatud!')
        ->with('news', $news)
        ->with('info', $info)
        ->with('info', $fair_info);

  }



  public function storeFaq(StoreFaqPageRequest $request)
  {

//    $pages = Page::orderBy('created_at', 'desc')->get();

    $what = Page::where('permalink', 'LIKE', '%what%')->first();
    $why = Page::where('permalink', 'LIKE', '%why%')->first();
    $when = Page::where('permalink', 'LIKE', '%when%')->first();
    $with_who = Page::where('permalink', 'LIKE', '%with_who%')->first();
    $how = Page::where('permalink', 'LIKE', '%how%')->first();
    $which = Page::where('permalink', 'LIKE', '%which%')->first();


    $what->body_et = $request->what_et;
    $what->body_en = $request->what_en;

    $why->body_et = $request->why_et;
    $why->body_en = $request->why_en;

    $when->body_et = $request->when_et;
    $when->body_en = $request->when_en;

    $with_who->body_et = $request->with_who_et;
    $with_who->body_en = $request->with_who_en;

    $how->body_et = $request->how_et;
    $how->body_en = $request->how_en;

    $which->body_et = $request->which_et;
    $which->body_en = $request->which_en;

    $what->save();
    $why->save();
    $when->save();
    $with_who->save();
    $how->save();
    $which->save();

    return \Redirect::to('/faq/edit')
        ->with('message', 'KKK on uuendatud!')
        ->with(compact('what', 'why', 'when', 'with_who', 'how', 'which'));


  }
}
