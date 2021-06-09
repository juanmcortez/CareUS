<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Common\Persona;
use App\Models\Users\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('Auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'        => 'required|string|max:255',
            'middle_name'       => 'nullable|max:255',
            'last_name'         => 'required|string|max:255',
            'email'             => 'required|string|email|max:255|unique:users',
            'password'          => ['required', 'confirmed', Rules\Password::defaults()],
            'email_verified_at' => 'nullable',
        ]);

        $user = User::create([
            'email'             => $request->email,
            'password'          => Hash::make($request->password),
            'email_verified_at' => null
        ]);

        $persona = Persona::create([
            'owner_id'          => $user->id,
            'owner_type'        => 'user',
            'first_name'        => $request->first_name,
            'middle_name'       => $request->middle_name,
            'last_name'         => $request->last_name,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('user.settings', ['user' => $user->id]));
    }
}
