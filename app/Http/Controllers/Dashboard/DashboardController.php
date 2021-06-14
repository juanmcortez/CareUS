<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Common\Persona;
use App\Models\Patients\Patient;
use Carbon\Carbon;

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

        // Get last 30 days stats
        $today = Carbon::now()->format('Y-m-d 23:59:59');
        $day30 = Carbon::now()->subDays(30)->format('Y-m-d 00:00:00');
        $d3060 = Carbon::parse(Carbon::now()->subDays(31)->format('Y-m-d 23:59:59'))->subDays(30)->format('Y-m-d 00:00:00');

        $patientlast30  = Patient::whereBetween('created_at', [$day30, $today])->count();
        $patientprev30  = Patient::whereBetween('created_at', [$d3060, $day30])->count();
        $patientprev30  = ($patientprev30 == 0) ? 1 : $patientprev30;
        $patientgrow30  = round((($patientlast30 - $patientprev30) / $patientprev30) * 100, 2);

        $editlast30     = Patient::whereBetween('updated_at', [$day30, $today])->whereColumn('created_at', '!=', 'updated_at')->count();
        $editprev30     = Patient::whereBetween('updated_at', [$d3060, $day30])->whereColumn('created_at', '!=', 'updated_at')->count();
        $editprev30     = ($editprev30 == 0) ? 1 : $editprev30;
        $editgrow30     = round((($editlast30 - $editprev30) / $editprev30) * 100, 2);

        $patienttotals  = Patient::count();
        $totalimages    = Persona::where('owner_type', 'patient')->whereNotNull('profile_photo')->count();

        $stats = [
            'patienttotals' => $patienttotals,
            'patientlast30' => $patientlast30,
            'patientgrow30' => $patientgrow30,
            'editlast30'    => $editlast30,
            'editgrow30'    => $editgrow30,
            'totalimages'   => $totalimages,
        ];

        return view('Dashboard.index', compact('pageTitle', 'pageH2', 'stats'));
    }
}
