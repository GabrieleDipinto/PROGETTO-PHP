<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if ($this->input('login_type') === 'admin') {
            return [
                'login_type' => ['required', 'in:user,admin'],
                'admin_code' => ['required', 'string', 'max:10'],
            ];
        }
        return [
            'login_type' => ['required', 'in:user,admin'],
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(): void
    {
        if ($this->input('login_type') === 'admin') {
            // Autenticazione admin tramite codice
            $admin = \App\Models\Admin::where('code', $this->input('admin_code'))->first();
            if (!$admin) {
                throw \Illuminate\Validation\ValidationException::withMessages([
                    'admin_code' => 'Codice admin non valido.',
                ]);
            }
            // Non scrivo più la sessione qui!
            return;
        }
        // Login utente classico
        $this->ensureIsNotRateLimited();

        if (! \Illuminate\Support\Facades\Auth::attempt($this->only('email', 'password'), $this->boolean('remember'))) {
            \Illuminate\Support\Facades\RateLimiter::hit($this->throttleKey());

            throw \Illuminate\Validation\ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }

        \Illuminate\Support\Facades\RateLimiter::clear($this->throttleKey());
        // Rimuovi eventuale sessione admin precedente
        session()->forget(['is_admin', 'admin_id', 'admin_name']);
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
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
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->string('email')).'|'.$this->ip());
    }
}
