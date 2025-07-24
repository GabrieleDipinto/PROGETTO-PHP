<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nuova Prenotazione Ritiro') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('prenotazioni.store') }}" class="space-y-6">
                        @csrf

                        <!-- Tipo Rifiuto -->
                        <div>
                            <x-input-label for="tipo_rifiuto" :value="__('Tipo di Rifiuto')" />
                            <select id="tipo_rifiuto" name="tipo_rifiuto" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option value="">Seleziona il tipo di rifiuto</option>
                                <option value="Mobili">Mobili</option>
                                <option value="Elettrodomestici">Elettrodomestici</option>
                                <option value="Materiali edili">Materiali edili</option>
                                <option value="Sfalci e potature">Sfalci e potature</option>
                                <option value="Altro">Altro</option>
                            </select>
                            <x-input-error :messages="$errors->get('tipo_rifiuto')" class="mt-2" />
                        </div>

                        <!-- Quantità -->
                        <div>
                            <x-input-label for="quantita" :value="__('Quantità (in metri cubi)')" />
                            <x-text-input id="quantita" name="quantita" type="number" step="0.1" min="0.1" max="10" class="mt-1 block w-full" required />
                            <p class="mt-1 text-sm text-gray-500">Inserisci la quantità approssimativa in metri cubi (max 10 m³)</p>
                            <x-input-error :messages="$errors->get('quantita')" class="mt-2" />
                        </div>

                        <!-- Data Ritiro -->
                        <div>
                            <x-input-label for="data_ritiro" :value="__('Data del Ritiro')" />
                            <x-text-input id="data_ritiro" name="data_ritiro" type="date" class="mt-1 block w-full" required />
                            <p class="mt-1 text-sm text-gray-500">Scegli una data con almeno 2 giorni di anticipo</p>
                            <x-input-error :messages="$errors->get('data_ritiro')" class="mt-2" />
                        </div>

                        <!-- Note -->
                        <div>
                            <x-input-label for="note" :value="__('Note Aggiuntive')" />
                            <textarea id="note" name="note" rows="3" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"></textarea>
                            <p class="mt-1 text-sm text-gray-500">Aggiungi eventuali dettagli o istruzioni particolari</p>
                            <x-input-error :messages="$errors->get('note')" class="mt-2" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Prenota Ritiro') }}</x-primary-button>
                            <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 focus:bg-gray-400 active:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ __('Annulla') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 