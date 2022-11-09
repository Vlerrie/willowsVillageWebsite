<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Rules\SaMobileNumber;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
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
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->merge([
            'cell' => str_replace('+', '', $request->cell)
        ]);
        if (Str::startsWith($request->cell, '0')) {
            $request->merge([
                'cell' => '27' . substr($request->cell, 1)
            ]);
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required_without:cell', 'nullable', 'string', 'email', 'max:255', 'unique:users'],
            'cell' => ['required_without:email', 'nullable', 'string', new SaMobileNumber()],
            'password' => ['required', Rules\Password::defaults()],
            'street_number' => ['required'],
            'route' => ['required'],
            'sublocality' => ['required'],
            'locality' => ['required'],
            'postal_code' => ['required'],
            'field_string' => ['required'],
        ], [
            'street_number.required' => 'Please start typing in the field below until you see a google suggestion to click on.',
            'route.required' => 'Please start typing in the field below until you see a google suggestion to click on.',
            'sublocality.required' => 'Please start typing in the field below until you see a google suggestion to click on.',
            'locality.required' => 'Please start typing in the field below until you see a google suggestion to click on.',
            'postal_code.required' => 'Please start typing in the field below until you see a google suggestion to click on.',
        ]);

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'cell' => $request->cell,
            'password' => Hash::make($request->password),
            'street_number' => $request->street_number,
            'route' => $request->route,
            'sublocality' => $request->sublocality,
            'locality' => $request->locality,
            'postal_code' => $request->postal_code,
            'google_address_string' => $request->field_string,
        ]);

        event(new Registered($user));

        Auth::login($user);

        session()->flash('flash_message', [
            'heading' => 'Registration Successful',
            'message' => 'Hi ' . Auth::user()->name . ', thank you for joining us!',
        ]);

        return redirect(RouteServiceProvider::HOME);
    }
}
