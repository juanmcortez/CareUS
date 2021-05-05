<?php

namespace App\Http\Controllers\Patients;

use App\Http\Controllers\Controller;
use App\Models\Common\Persona;
use App\Models\Lists\Items;
use App\Models\Patients\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageH2 = __("Patient's list");
        $pageTitle = $pageH2 . ' | ' . config('app.name');
        $personas = Persona::query()->where('owner_type', 'patient')->orderBy('last_name')->orderBy('first_name')->paginate(10);
        return view('Patients.index', compact('pageTitle', 'pageH2', 'personas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patients\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        $pageH2 =  __("Ledger: :patient_name", ['patient_name' => $patient->persona->formated_name]);
        $pageTitle = $pageH2 . ' | ' . config('app.name');
        return view('Patients.show', compact('pageTitle', 'pageH2', 'patient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patients\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        $pageH2 =  __("Edit Demographics", ['patient_name' => $patient->persona->formated_name]);
        $pageTitle = $pageH2 . ' | ' . config('app.name');
        $seletItems = new Items();
        $items = $seletItems->getSelectListsItems($patient);
        return view('Patients.edit', compact('pageTitle', 'pageH2', 'patient', 'items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patients\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        dd($request, $patient);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patients\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //
    }
}
