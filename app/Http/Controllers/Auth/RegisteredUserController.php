<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Rules\SaMobileNumber;
use App\Rules\UniqueIgnoreEmpty;
use App\ServiceProvider\GoogleRecaptcha;
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
        $recaptcha = new GoogleRecaptcha();
        $valid = $recaptcha->verifyRequest($request->all()['g-recaptcha-response'] ,$request->getClientIp());

        if (!$valid->success){
            session()->flash('flash_message', [
                'heading' => 'reCaptcha Error',
                'message' => 'Something went wrong please try again',
                'type' => 'bg-warning'
            ]);
            return back();
        }

        $request->merge([
            'cell' => str_replace('+', '', $request->cell)
        ]);
        if (Str::startsWith($request->cell, '0')) {
            $request->merge([
                'cell' => '27' . substr($request->cell, 1)
            ]);
        }

        if (isset($request->password, $request->email)){
            $exist = User::where('email', $request->email)
                ->first();
        }elseif(isset($request->password, $request->cell)){
            $exist = User::where('cell', $request->cell)
                ->first();
        }
        if (isset($exist->id) && !isset($exist->password)){
            $exist->delete();
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required_without:cell', 'nullable', 'string', 'email', 'max:255', new UniqueIgnoreEmpty('users')],
            'cell' => ['required_without:email', 'nullable', 'string', new SaMobileNumber(), new UniqueIgnoreEmpty('users')],
            'password' => ['required_with:cell', 'nullable', Rules\Password::defaults()],
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

        $password = null;
        if (!empty($request->password)){
            $password = Hash::make($request->password);
        }

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'cell' => $request->cell,
            'password' => $password,
            'street_number' => $request->street_number,
            'route' => $request->route,
            'sublocality' => $request->sublocality,
            'locality' => $request->locality,
            'postal_code' => $request->postal_code,
            'google_address_string' => $request->field_string,
        ]);

        event(new Registered($user));

        if (isset($password)){
            Auth::login($user);
            session()->flash('flash_message', [
                'heading' => 'Registration Successful',
                'message' => 'Hi ' . Auth::user()->name . ', thank you for joining us!',
            ]);
        }
        session()->flash('flash_message', [
            'heading' => 'Signup Successful',
            'message' => 'Thank you for joining the mailing list. You are always welcome to register an account at a later stage.',
        ]);



        return redirect(RouteServiceProvider::HOME);
    }
}
