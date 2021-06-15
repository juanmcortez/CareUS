<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Models\Common\Note;
use App\Models\Patients\Patient;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageH2 = __("Notes");
        $pageTitle = $pageH2 . ' | ' . config('app.name');

        $notes = Note::where('user_id', Auth::id())->paginate(5);

        return view('User.notes', compact('pageTitle', 'pageH2', 'notes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patients\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Patient $patient)
    {
        $validator = Validator::make($request->all(), [
            'note.title'    => ['required', 'max:64'],
            'note.body'     => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect(route('patients.show', ['patient' => $patient->patID, 'ledgerTab' => 'notes']))
                ->withErrors($validator)
                ->withInput();
        } else {
            $note['owner_type'] = 'patient';
            $note['owner_id']   = $patient->patID;
            $note['user_id']    = Auth::id();
            $note['category']   = 'patient';
            $note['title']      = $request->input('note.title');
            $note['body']       = $request->input('note.body');

            Note::create($note);

            return redirect(route('patients.show', ['patient' => $patient->patID, 'ledgerTab' => 'notes']))
                ->with('success', __('New note added sucessfully'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patients\Patient  $patient
     * @param  \App\Models\Common\Note  $notes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient, $notes)
    {
        $selected = Note::findOrFail($notes);
        if ($selected->owner_id == $patient->patID && $selected->user_id == Auth::id()) {
            if ($selected->delete()) {
                return redirect(route('patients.show', ['patient' => $patient->patID, 'ledgerTab' => 'notes']))
                    ->with('success', __('Note deleted sucessfully'));
            }
        }
    }
}
