<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AccountController extends Controller
{
    public function index()
    {
        return view(
            'accounts.account',
            [
                'account' => Auth::user()
            ]
        );
    }

    public function update(Request $request)
    {
        $request->validate(
            [
                'email' => ['sometimes', 'email', 'max:255'],
                'cell' => ['sometimes', 'numeric', 'max:13', 'min:10'],
                'name' => ['required', 'string', 'max:255'],
                'surname' => ['required', 'string', 'max:255'],
                'street_number' => ['required'],
                'route' => ['required'],
                'sublocality' => ['required'],
                'locality' => ['required'],
                'postal_code' => ['required'],
                'field_string' => ['required'],
            ],
            [
                'street_number.required' => 'Please start typing in the field below until you see a google suggestion to click on.',
            ]
        );

        User::where('id', Auth::user()->id)
            ->update(
                [
                    'name' => $request->name,
                    'surname' => $request->surname,
                    'street_number' => $request->street_number,
                    'route' => $request->route,
                    'sublocality' => $request->sublocality,
                    'locality' => $request->locality,
                    'postal_code' => $request->postal_code,
                    'google_address_string' => $request->field_string,
                    'complex_name' => $request->complex_name,
                    'complex_unit' => $request->complex_unit,
                ]
            );

        if (isset($request->email) || isset($request->cell)) {
            $user = User::find(Auth::user()->id);
            if (isset($request->email) && !isset($user->email)) {
                $user->email = $request->email;
            }
            if (isset($request->cell) && !isset($user->cell)) {
                $user->cell = $request->cell;
            }
            $user->save();
        }

        session()->flash(
            'flash_message',
            [
                'heading' => 'Updated',
                'message' => 'Your account has been updated',
                'type' => 'bg-success'
            ]
        );

        return back();
    }

    public function commsUpdate(Request $request)
    {
        session()->flash('last_form', 'comms');
        User::where('id', Auth::user()->id)
            ->update(
                [
                    'comm_newsletter' => isset($request->comm_newsletter),
                    'comm_events' => isset($request->comm_events)
                ]
            );

        session()->flash(
            'flash_message',
            [
                'heading' => 'Updated',
                'message' => 'Your communication preferences have been updated',
                'type' => 'bg-success'
            ]
        );
        return back();
    }

    public function changePW(Request $request)
    {
        session()->flash('last_form', 'pw');
        $request->validate(
            [
                'old_password' => ['required'],
                'password' => ['required', Password::defaults()],
            ]
        );

        $user = User::where('id', Auth::user()->id)->first();
        if (Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->password);
            $user->save();
        }
        session()->flash(
            'flash_message',
            [
                'heading' => 'Updated',
                'message' => 'Your password has been updated',
                'type' => 'bg-success'
            ]
        );
        return back();
    }

    public function delete(Request $request)
    {
        session()->flash(
            'flash_message',
            [
                'heading' => 'Account Deleted',
                'message' => 'We\'re sorry to see you go!',
                'type' => 'bg-danger'
            ]
        );
        User::find(Auth::user()->id)->delete();
        Auth::logout();
        return redirect('/');
    }
}