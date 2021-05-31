<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateUserRequest;
use App\Models\Common\Persona;
use App\Models\Lists\Items;
use App\Models\Users\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageH2 = __(":name profile", ['name' => Auth::user()->persona->formated_name]);
        $pageTitle = $pageH2 . ' | ' . config('app.name');
        $selectItems = new Items();
        $items = $selectItems->getItemsLists();
        return view('Auth.user-profile', compact('pageTitle', 'pageH2', 'items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ValidateUserRequest  $request
     * @param  \App\Models\Patients\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateUserRequest $request, User $user)
    {
        /* ***** PREPARE data ***** */
        $completeData       = $request->all();
        $userData           = $completeData['user'];
        $personaData        = $completeData['user']['persona'];

        /* ***** PREPARE Dates ***** */
        $dob = $personaData['date_of_birth']['year'] . '-' . $personaData['date_of_birth']['month'] . '-' . $personaData['date_of_birth']['day'];

        // This removes arrays that might cause issues when mass assign
        unset($userData['persona']);
        unset($personaData['date_of_birth']);

        $personaData['date_of_birth'] = $dob;

        /* ***** SAVE User model **** */
        $updateuser = User::where('id', $userData['id'])->update($userData);

        /* ***** SAVE User - Persona model **** */
        $updatepersona = Persona::where('owner_id', $userData['id'])->where('owner_type', 'user')->update($personaData);

        /* ***** Redirect to ledger view **** */
        return redirect()->route('user.settings', ["user" => $user->id])
            ->with('success', __('User <strong>:name</strong> updated successfully', ["name" => $user->persona->formated_name]));
    }
}
