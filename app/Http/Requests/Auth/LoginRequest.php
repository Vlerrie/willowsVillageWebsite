<?php

namespace App\Http\Requests\Auth;

use App\ServiceProvider\GoogleRecaptcha;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    protected $UserField;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }

    public function prepareForValidation()
    {
        $recaptcha = new GoogleRecaptcha();
        $valid = $recaptcha->verifyRequest($this->request->all()['g-recaptcha-response'] ,$this->getClientIp());

        if (!$valid->success){
            session()->flash('flash_message', [
                'heading' => 'reCaptcha Error',
                'message' => 'Something went wrong please try again',
                'type' => 'bg-warning'
            ]);
            return back();
        }


        if (is_numeric($this->email)) {
            $this->merge([
                'cell' => str_replace('+', '', $this->email)
            ]);
            if (Str::startsWith($this->cell, '0')) {
                $this->merge([
                    'cell' => '27' . substr($this->cell, 1)
                ]);
            }
            $this->UserField = 'cell';
        } else {
            $this->UserField = 'email';
        }
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate()
    {
        $this->ensureIsNotRateLimited();

        if (!Auth::attempt($this->only($this->UserField, 'password'), $this->boolean('remember'))) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }

        $user = Auth::user();
        session()->flash('flash_message', [
            'heading' => 'Authenticated',
            'message' => 'Welcome back ' . $user->name,
            'type' => 'bg-success'
        ]);
//        session()->put('user', [
//            'id' => $user->id,
//            'name' => $user->name,
//            'surname' => $user->surname,
//            'email' => $user->email,
//            'email_verified_at' => $user->email_verified_at,
//            'admin' => $user->admin
//        ]);

        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited()
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     *
     * @return string
     */
    public function throttleKey()
    {
        return Str::transliterate(Str::lower($this->input('email')) . '|' . $this->ip());
    }
}
