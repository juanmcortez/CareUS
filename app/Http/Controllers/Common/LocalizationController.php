<?php

namespace App\Http\Controllers\Common;

use App;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocalizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($locale)
    {
        // Change system language
        App::setLocale($locale);
        session()->put('locale', $locale);

        // Redirect back
        return redirect()->back();
    }
}
