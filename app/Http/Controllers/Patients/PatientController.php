<?php

namespace App\Http\Controllers\Patients;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidatePatientRequest;
use App\Models\Common\Address;
use App\Models\Common\Persona;
use App\Models\Common\Phone;
use App\Models\Lists\Items;
use App\Models\Patients\Patient;

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
        $pageH2 = __("New Patient");
        $pageTitle = $pageH2 . ' | ' . config('app.name');
        $selectItems = new Items();
        $items = $selectItems->getItemsLists();
        $phones = array('', '');
        $contacts = array('', '', '');
        return view('Patients.new', compact('pageTitle', 'pageH2', 'items', 'phones', 'contacts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ValidatePatientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidatePatientRequest $request)
    {
        /* ***** PREPARE data ***** */
        $completeData       = $request->all();
        $patientData        = $completeData['patient'];
        $personaData        = $completeData['patient']['persona'];
        $personaPhones      = $completeData['patient']['persona']['phone'];
        $personaAddress     = $completeData['patient']['persona']['address'];
        $contactItems       = $completeData['patient']['contact'];
        $employerItems      = $completeData['patient']['employer'];

        /* ***** PREPARE Dates ***** */
        $dob = $personaData['date_of_birth']['year'] . '-' . $personaData['date_of_birth']['month'] . '-' . $personaData['date_of_birth']['day'];
        if (!empty($personaData['decease_date']['year']) && !empty($personaData['decease_date']['year']) && !empty($personaData['decease_date']['year'])) {
            $dod = $personaData['decease_date']['year'] . '-' . $personaData['decease_date']['month'] . '-' . $personaData['decease_date']['day'];
        } else {
            $dod = null;
        }
        // This removes arrays that might cause issues when mass assign
        unset($patientData['persona']);
        unset($personaData['date_of_birth']);
        unset($personaData['decease_date']);
        unset($personaData['phone']);
        unset($personaData['address']);

        /* ***** SAVE Patient model **** */
        $patient = Patient::create($patientData);

        /* ***** SAVE Patient - Persona model **** */
        $persona = Persona::make($personaData);
        $persona->owner_id = $patient->patID;
        $persona->owner_type = 'patient';
        $persona->date_of_birth = $dob;
        $persona->decease_date = $dod;
        $persona->save();

        /* ***** SAVE Patient - Persona - Phone model **** */
        foreach ($personaPhones as $phone) {
            $pphone = Phone::make($phone);
            $pphone->owner_id = $persona->id;
            $pphone->owner_type = 'persona';
            $pphone->save();
        }

        /* ***** SAVE Patient - Persona - Address model **** */
        $paddrs = Address::make($personaAddress);
        $paddrs->owner_id = $persona->id;
        $paddrs->owner_type = 'persona';
        $paddrs->save();

        /* ***** SAVE Patient - Contact - Persona/Phone/Address model **** */
        foreach ($contactItems as $item) {
            $contact = Persona::make($item);
            $contact->owner_id = $patient->patID;
            $contact->owner_type = 'contact';
            $contact->save();

            $itmpho = $item['phone'];
            $cphone = Phone::make($itmpho);
            $cphone->owner_id = $contact->id;
            $cphone->owner_type = 'persona';
            $cphone->save();

            $itmadd = $item['address'];
            $caddrs = Address::make($itmadd);
            $caddrs->owner_id = $contact->id;
            $caddrs->owner_type = 'persona';
            $caddrs->save();
        }

        /* ***** SAVE Patient - Employer - Persona model **** */
        $employer = Persona::make($employerItems);
        $employer->owner_id = $patient->patID;
        $employer->owner_type = 'employment';
        $employer->save();

        /* ***** SAVE Patient - Employer - Phone model **** */
        $itmpho = $employerItems['phone'];
        $ephone = Phone::make($itmpho);
        $ephone->owner_id = $employer->id;
        $ephone->owner_type = 'persona';
        $ephone->save();

        /* ***** SAVE Patient - Employer - Address model **** */
        $itmadd = $employerItems['address'];
        $eaddrs = Address::make($itmadd);
        $eaddrs->owner_id = $employer->id;
        $eaddrs->owner_type = 'persona';
        $eaddrs->save();

        /* ***** Redirect to ledger view **** */
        return redirect(route('patients.show', ['patient' => $patient->patID]))->with('success', 'Patient created successfully');
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
        $selectItems = new Items();
        $items = $selectItems->getSelectListsItems($patient);
        return view('Patients.edit', compact('pageTitle', 'pageH2', 'patient', 'items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ValidatePatientRequest  $request
     * @param  \App\Models\Patients\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(ValidatePatientRequest $request, Patient $patient)
    {
        dd($request->validationData());
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
