<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class LanguageController extends Controller
{
  public function switchLang($lang)
  {
    if (array_key_exists($lang, Config::get('languages'))) {
      Session::set('applocale', $lang);
    }
    return Redirect::back();
  }
}
