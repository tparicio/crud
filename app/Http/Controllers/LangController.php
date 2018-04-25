<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lang;
use Session;

class LangController extends Controller
{
      /**
       * change GUI lang
       *
       * @param  Request $request [description]
       * @author Toni Paricio <toniparicio@gmail.com>
       * @since  2018-04-25
       */
      public function set(Request $request, $lang)
      {
          $iso  = strtoupper($lang);
          $lang = Lang::where('iso', $iso)->first();

          if ($lang) {
            Session::put('locale', $iso);
            Session::save();
            \App::setLocale(strtolower($lang->iso));

            return redirect('/')->with('message', "Lang was changed to {$lang->name}");
          } else {
            return redirect('/')->with('error', "Lang {$iso} is not a valid GUI lang");
          }
      }
}
