<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Risolvi Segnalazione') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="mb-4 font-bold">Segnalazione #{{ $segnalazione->id }}</h3>
                    <p><strong>Tipo:</strong> {{ $segnalazione->tipo }}</p>
                    <p><strong>Descrizione:</strong> {{ $segnalazione->descrizione }}</p>
                    <p><strong>Indirizzo:</strong> {{ $segnalazione->via }}, {{ $segnalazione->civico }} - {{ $segnalazione->cap }}</p>
                    <form method="POST" action="{{ route('admin.segnalazioni.risolvi', $segnalazione->id) }}" class="mt-6 space-y-4">
                        @csrf
                        <div>
                            <x-input-label for="nota_risoluzione" :value="__('Nota di risoluzione')" />
                            <textarea id="nota_risoluzione" name="nota_risoluzione" rows="4" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required></textarea>
                            <x-input-error :messages="$errors->get('nota_risoluzione')" class="mt-2" />
                        </div>
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Segna come risolta') }}</x-primary-button>
                            <a href="{{ route('admin.segnalazioni') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 focus:bg-gray-400 active:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ __('Annulla') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 