<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Selettore Utente/Admin -->
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Accedi come:</label>
            <div class="flex gap-4">
                <label class="inline-flex items-center">
                    <input type="radio" name="login_type" value="user" id="login_type_user" checked onclick="toggleLoginType()">
                    <span class="ml-2">Utente</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" name="login_type" value="admin" id="login_type_admin" onclick="toggleLoginType()">
                    <span class="ml-2">Admin</span>
                </label>
            </div>
        </div>

        <!-- Email Address (solo utente) -->
        <div id="user_fields">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
        </div>

        <!-- Codice Admin (solo admin) -->
        <div id="admin_fields" style="display:none;">
            <x-input-label for="admin_code" :value="__('Codice Admin')" />
            <x-text-input id="admin_code" class="block mt-1 w-full" type="text" name="admin_code" />
            <x-input-error :messages="$errors->get('admin_code')" class="mt-2" />
        </div>

        <!-- Remember Me (solo utente) -->
        <div class="block mt-4" id="remember_me_block">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

    <script>
        function toggleLoginType() {
            const isAdmin = document.getElementById('login_type_admin').checked;
            document.getElementById('user_fields').style.display = isAdmin ? 'none' : '';
            document.getElementById('admin_fields').style.display = isAdmin ? '' : 'none';
            document.getElementById('remember_me_block').style.display = isAdmin ? 'none' : '';
        }
        // Inizializza correttamente al caricamento
        document.addEventListener('DOMContentLoaded', toggleLoginType);
    </script>
</x-guest-layout>
