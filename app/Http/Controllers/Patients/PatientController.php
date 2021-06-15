<?php

namespace App\Http\Controllers\Patients;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidatePatientRequest;
use App\Models\Common\Address;
use App\Models\Common\Persona;
use App\Models\Common\Phone;
use App\Models\Insurances\Subscriber;
use App\Models\Lists\Items;
use App\Models\Patients\Patient;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

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

        $instypes = $items['inscomtype'];
        $subsinslists = new Subscriber();
        $insurances = $subsinslists->getInsuranceListItems();

        return view('Patients.new', compact('pageTitle', 'pageH2', 'items', 'phones', 'contacts', 'instypes', 'insurances'));
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
        $subscriberItems    = $completeData['patient']['subscriber'];

        /* ***** PREPARE Dates ***** */
        $dob = $personaData['date_of_birth']['year'] . '-' . $personaData['date_of_birth']['month'] . '-' . $personaData['date_of_birth']['day'];
        if (!is_null($personaData['decease_date']['year']) && !is_null($personaData['decease_date']['year']) && !is_null($personaData['decease_date']['year'])) {
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

        /* ***** HANDLE Profile Photo ***** */
        if ($request->hasFile('patient.persona.profile_photo')) {
            // Get the uploaded image and resize it with aspect ratio change it to jpg in 75% quality
            $modifyupload = Image::make($request->file('patient.persona.profile_photo')->path())->fit(100)->encode('jpg', 75);
            // Create the new name
            $newfilenam = md5(uniqid(time(), true)) . '.jpg';
            // Store the file in the system and prepare reference for db
            if (Storage::put(env('PAT_FILE_STO') . DIRECTORY_SEPARATOR . $newfilenam, $modifyupload)) {
                $personaData['profile_photo'] = env('PAT_FILE_LOC') . DIRECTORY_SEPARATOR . $newfilenam;
            }
        }

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

        /* ***** SAVE Subscriber Insurance **** */
        foreach ($subscriberItems as $insSubs) {
            if (!is_null($insSubs['effective_date']['year']) && !is_null($insSubs['effective_date']['year']) && !is_null($insSubs['effective_date']['year'])) {
                $eff = $insSubs['effective_date']['year'] . '-' . $insSubs['effective_date']['month'] . '-' . $insSubs['effective_date']['day'];
            } else {
                $eff = now();
            }
            if (!is_null($insSubs['termination_date']['year']) && !is_null($insSubs['termination_date']['year']) && !is_null($insSubs['termination_date']['year'])) {
                $ter = $insSubs['termination_date']['year'] . '-' . $insSubs['termination_date']['month'] . '-' . $insSubs['termination_date']['day'];
            } else {
                $ter = null;
            }

            $subPers = $insSubs['persona'];
            if (!is_null($subPers['date_of_birth']['year']) && !is_null($subPers['date_of_birth']['year']) && !is_null($subPers['date_of_birth']['year'])) {
                $sob = $subPers['date_of_birth']['year'] . '-' . $subPers['date_of_birth']['month'] . '-' . $subPers['date_of_birth']['day'];
            } else {
                $sob = null;
            }

            unset($insSubs['persona']);
            unset($insSubs['effective_date']);
            unset($insSubs['termination_date']);
            unset($subPers['date_of_birth']);

            $subscriber = Subscriber::make($insSubs);
            $subscriber->owner_id = $patient->patID;
            $subscriber->owner_type = 'patient';
            $subscriber->effective_date = $eff;
            $subscriber->termination_date = $ter;
            $subscriber->save();

            $sperso = Persona::make($subPers);
            $sperso->owner_id = $subscriber->subID;
            $sperso->owner_type = 'subscriber';
            $sperso->date_of_birth = $sob;
            $sperso->save();

            $subpho = $subPers['phone'];
            $sphone = Phone::make($subpho);
            $sphone->owner_id = $sperso->id;
            $sphone->owner_type = 'persona';
            $sphone->save();

            $subadd = $subPers['address'];
            $saddrs = Address::make($subadd);
            $saddrs->owner_id = $sperso->id;
            $saddrs->owner_type = 'persona';
            $saddrs->save();
        }

        /* ***** Redirect to ledger view **** */
        return redirect(route('patients.show', ['patient' => $patient->patID]))
            ->with('success', __('Patient <strong>:name</strong> created successfully', ["name" => $patient->persona->formated_name]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patients\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient, $ledgerTab = 'ledger')
    {
        $pageH2 =  __("Ledger: :patient_name", ['patient_name' => $patient->persona->formated_name]);
        $pageTitle = $pageH2 . ' | ' . config('app.name');

        $selectItems = new Items();
        $items = $selectItems->getItemsLists();

        $instypes = $items['inscomtype'];

        $balancetable = [
            ['Insurance', 0, 0, 0, 0, 0, 0, 0],
            ['Patient', 0, 0, 0, 0, 0, 0, 0],
            ['Account', 0, 0, 0, 0, 0, 0, 0],
        ];

        return view('Patients.show', compact('pageTitle', 'pageH2', 'patient', 'instypes', 'balancetable', 'ledgerTab'));
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

        $instypes = $items['inscomtype'];
        $subsinslists = new Subscriber();
        $insurances = $subsinslists->getInsuranceListItems();

        return view('Patients.edit', compact('pageTitle', 'pageH2', 'patient', 'items', 'instypes', 'insurances'));
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
        /* ***** PREPARE data ***** */
        $completeData       = $request->all();
        $patientData        = $completeData['patient'];
        $personaData        = $completeData['patient']['persona'];
        $personaPhones      = $completeData['patient']['persona']['phone'];
        $personaAddress     = $completeData['patient']['persona']['address'];
        $contactItems       = $completeData['patient']['contact'];
        $employerItems      = $completeData['patient']['employment'];
        $subscriberItems    = $completeData['patient']['subscriber'];

        /* ***** PREPARE Dates ***** */
        $dob = $personaData['date_of_birth']['year'] . '-' . $personaData['date_of_birth']['month'] . '-' . $personaData['date_of_birth']['day'];
        if (!is_null($personaData['decease_date']['year']) && !is_null($personaData['decease_date']['year']) && !is_null($personaData['decease_date']['year'])) {
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

        // Update values
        $personaData['date_of_birth'] = $dob;
        ($dod != null) ? $personaData['decease_date'] = $dod : $personaData['decease_date'] = null;

        /* ***** SAVE Patient model **** */
        $updatepatient = Patient::findOrFail($patient->patID)->update($patientData);

        /* ***** HANDLE Profile Photo ***** */
        if ($request->hasFile('patient.persona.profile_photo')) {
            // Get the uploaded image and resize it with aspect ratio change it to jpg in 75% quality
            $modifyupload = Image::make($request->file('patient.persona.profile_photo')->path())->fit(100)->encode('jpg', 75);
            // Create the new name
            $newfilenam = md5(uniqid(time(), true)) . '.jpg';
            // Store the file in the system and prepare reference for db
            if (Storage::put(env('PAT_FILE_STO') . DIRECTORY_SEPARATOR . $newfilenam, $modifyupload)) {
                // Delete the old image
                if (Patient::findOrFail($patient->patID)->persona->profile_photo) {
                    $oldprofpho = Patient::findOrFail($patient->patID)->persona->profile_photo;
                    $oldprofpho = explode(env('PAT_FILE_LOC') . DIRECTORY_SEPARATOR, $oldprofpho);
                    Storage::delete(env('PAT_FILE_STO') . DIRECTORY_SEPARATOR . $oldprofpho[1]);
                }
                // New image location
                $personaData['profile_photo'] = env('PAT_FILE_LOC') . DIRECTORY_SEPARATOR . $newfilenam;
            }
        }

        /* ***** SAVE Patient - Persona model **** */
        $updatepersona = Persona::where('owner_id', $patient->patID)->where('owner_type', 'patient')->update($personaData);

        /* ***** SAVE Patient - Persona - Phone model **** */
        foreach ($patient->persona->phone as $idx => $phone) {
            $phone->update($personaPhones[$idx]);
        }

        /* ***** SAVE Patient - Persona - Address model **** */
        $patient->persona->address->update($personaAddress);

        /* ***** SAVE Patient - Contact - Persona/Phone/Address model **** */
        foreach ($patient->contact as $idx => $contact) {
            $contact->update($contactItems[$idx]);

            $contact->phone->first()->update($contactItems[$idx]['phone']);

            $contact->address->update($contactItems[$idx]['address']);
        }

        $patient->employment->first()->update($employerItems);
        $patient->employment->first()->phone->first()->update($employerItems['phone']);
        $patient->employment->first()->address->update($employerItems['address']);

        foreach ($patient->subscriber as $idx => $subscriber) {
            $subsdata = $subscriberItems[$idx];
            $spersona = $subscriberItems[$idx]['persona'];
            $sperspho = $subscriberItems[$idx]['persona']['phone'];
            $spersadd = $subscriberItems[$idx]['persona']['address'];

            if (!is_null($subsdata['effective_date']['year']) && !is_null($subsdata['effective_date']['year']) && !is_null($subsdata['effective_date']['year'])) {
                $eff = $subsdata['effective_date']['year'] . '-' . $subsdata['effective_date']['month'] . '-' . $subsdata['effective_date']['day'];
            } else {
                $eff = now();
            }
            if (!is_null($subsdata['termination_date']['year']) && !is_null($subsdata['termination_date']['year']) && !is_null($subsdata['termination_date']['year'])) {
                $ter = $subsdata['termination_date']['year'] . '-' . $subsdata['termination_date']['month'] . '-' . $subsdata['termination_date']['day'];
            } else {
                $ter = null;
            }

            if (!is_null($spersona['date_of_birth']['year']) && !is_null($spersona['date_of_birth']['year']) && !is_null($spersona['date_of_birth']['year'])) {
                $sob = $spersona['date_of_birth']['year'] . '-' . $spersona['date_of_birth']['month'] . '-' . $spersona['date_of_birth']['day'];
            } else {
                $sob = null;
            }

            unset($subsdata['persona']);
            unset($subsdata['effective_date']);
            unset($subsdata['termination_date']);
            unset($spersona['date_of_birth']);

            $subsdata['effective_date'] = $eff;
            $subsdata['termination_date'] = $ter;

            $subscriber->update($subsdata);
            $subscriber->persona->update($spersona);
            foreach ($subscriber->persona->phone as $idx => $phone) {
                $phone->update($sperspho);
            }
            $subscriber->persona->address->update($spersadd);
        }

        /* ***** Redirect to ledger view **** */
        return redirect(route('patients.show', ['patient' => $patient->patID]))
            ->with('success', __('Patient <strong>:name</strong> updated successfully', ["name" => $patient->persona->formated_name]));
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
