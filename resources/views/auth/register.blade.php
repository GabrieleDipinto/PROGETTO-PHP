<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Nome -->
        <div>
            <x-input-label for="nome" :value="__('Nome')" />
            <x-text-input id="nome" class="block mt-1 w-full" type="text" name="nome" :value="old('nome')" required autofocus autocomplete="nome" />
            <x-input-error :messages="$errors->get('nome')" class="mt-2" />
        </div>

        <!-- Cognome -->
        <div class="mt-4">
            <x-input-label for="cognome" :value="__('Cognome')" />
            <x-text-input id="cognome" class="block mt-1 w-full" type="text" name="cognome" :value="old('cognome')" required autocomplete="cognome" />
            <x-input-error :messages="$errors->get('cognome')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Telefono -->
        <div class="mt-4">
            <x-input-label for="telefono" :value="__('Telefono')" />
            <x-text-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono')" required autocomplete="tel" />
            <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
        </div>

        <!-- Via -->
        <div class="mt-4">
            <x-input-label for="via" :value="__('Via')" />
            <x-text-input id="via" class="block mt-1 w-full" type="text" name="via" :value="old('via')" required autocomplete="street-address" />
            <x-input-error :messages="$errors->get('via')" class="mt-2" />
        </div>

        <!-- Civico -->
        <div class="mt-4">
            <x-input-label for="civico" :value="__('Numero Civico')" />
            <x-text-input id="civico" class="block mt-1 w-full" type="text" name="civico" :value="old('civico')" required />
            <x-input-error :messages="$errors->get('civico')" class="mt-2" />
        </div>

        <!-- CAP -->
        <div class="mt-4">
            <x-input-label for="cap" :value="__('CAP')" />
            <x-text-input id="cap" class="block mt-1 w-full" type="text" name="cap" :value="old('cap')" required autocomplete="postal-code" />
            <x-input-error :messages="$errors->get('cap')" class="mt-2" />
        </div>

        <!-- Età -->
        <div class="mt-4">
            <x-input-label for="eta" :value="__('Età')" />
            <x-text-input id="eta" class="block mt-1 w-full" type="number" name="eta" :value="old('eta')" required />
            <x-input-error :messages="$errors->get('eta')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Conferma Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Già registrato?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Registrati') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
