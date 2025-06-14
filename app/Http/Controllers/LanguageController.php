<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;

class LanguageController extends Controller
{
    public function switch($lang): RedirectResponse
    {
        if (in_array($lang, ['lv', 'en'])) {
            Session::put('locale', $lang);
        }

        return redirect()->back();
    }
}
