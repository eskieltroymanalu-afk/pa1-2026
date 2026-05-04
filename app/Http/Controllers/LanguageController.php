<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function switch($lang)
    {
        session(['Locale' => $lang]);
        return redirect() ->back();
    }
}
