<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $isAdmin = false;
        $adminData = null;

        if ($request->input('login_type') === 'admin') {
            $admin = \App\Models\Admin::where('code', $request->input('admin_code'))->first();
            if ($admin) {
                $isAdmin = true;
                $adminData = $admin;
            }
        }

        $request->authenticate();

        $request->session()->regenerate();

        // Solo ora scrivo la sessione admin!
        if ($isAdmin && $adminData) {
            $request->session()->put([
                'is_admin' => true,
                'admin_id' => $adminData->id,
                'admin_name' => $adminData->name,
            ]);
            return redirect()->intended('/admin/dashboard');
        }

        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        \Illuminate\Support\Facades\Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        // Pulisci la sessione admin
        $request->session()->forget(['is_admin', 'admin_id', 'admin_name']);

        return redirect('/');
    }
}
