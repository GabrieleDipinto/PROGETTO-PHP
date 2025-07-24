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

                        <!-- Selezione Data con vincoli feriali -->
                        <div>
                            <x-input-label for="data_ritiro_cal" :value="__('Seleziona una data (solo giorni feriali)')" />
                            <x-text-input id="data_ritiro_cal" name="data_ritiro_cal" type="date" class="mt-1 block w-full" required autofocus />
                            <x-input-error :messages="$errors->get('data_ritiro')" class="mt-2" />
                            <p class="mt-1 text-sm text-gray-500">Solo dal lunedì al venerdì. Sabato e domenica non selezionabili.</p>
                        </div>

                        <div id="form_fields" style="opacity:0.5; pointer-events:none;">
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
                                <x-input-label for="quantita" :value="__('Quantità (in kg)')" />
                                <x-text-input id="quantita" name="quantita" type="number" step="1" min="1" max="1000" class="mt-1 block w-full" />
                                <p class="mt-1 text-sm text-gray-500">Inserisci la quantità approssimativa in chilogrammi (max 1000 kg)</p>
                                <x-input-error :messages="$errors->get('quantita')" class="mt-2" />
                            </div>

                            <!-- Data Ritiro (hidden, sincronizzata) -->
                            <input type="hidden" id="data_ritiro" name="data_ritiro" />

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
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Imposta la data minima a domani
        const today = new Date();
        const minDate = new Date(today.getFullYear(), today.getMonth(), today.getDate() + 1);
        const input = document.getElementById('data_ritiro_cal');
        input.min = minDate.toISOString().split('T')[0];

        input.addEventListener('input', function() {
            const date = new Date(this.value);
            const day = date.getDay();
            // 0 = domenica, 6 = sabato
            if (day === 0 || day === 6) {
                alert('Seleziona solo giorni dal lunedì al venerdì.');
                this.value = '';
                document.getElementById('form_fields').style.opacity = 0.5;
                document.getElementById('form_fields').style.pointerEvents = 'none';
                document.getElementById('data_ritiro').value = '';
            } else {
                document.getElementById('form_fields').style.opacity = 1;
                document.getElementById('form_fields').style.pointerEvents = '';
                document.getElementById('data_ritiro').value = this.value;
            }
        });
    </script>
</x-app-layout> 