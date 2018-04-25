<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Lang;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Controller constructor
     *
     * @author Toni Paricio <toniparicio@gmail.com>
     * @since  2018-04-24
     */
    public function __construct()
    {
        // get user lang iso code from Locale and uppercase
        if(session()->has('locale')) {
            \App::setLocale(strtolower(session()->get('locale')));
        }
        $lang = \App::getLocale();
        $lang = strtoupper($lang);
        $lang = Lang::where('iso', $lang)->first();
        // if not lang find then user a default
        $lang = $lang ?: Lang::first();

        // Sharing some parameter in all views
        View::share('langs', Lang::orderBy('name')->get(['iso', 'name']));
        View::share('guiLang', $lang);
    }
}
