<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageH2 = __("Dashboard");
        $pageTitle = $pageH2 . ' | ' . config('app.name');
        return view('Dashboard.index', compact('pageTitle', 'pageH2'));
    }
}
