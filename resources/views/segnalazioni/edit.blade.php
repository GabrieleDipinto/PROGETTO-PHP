<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifica Segnalazione') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('segnalazioni.update', $segnalazione->id) }}" class="space-y-6" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Tipo Segnalazione -->
                        <div>
                            <x-input-label for="tipo" :value="__('Tipo di Segnalazione')" />
                            <select id="tipo" name="tipo" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option value="">Seleziona il tipo di segnalazione</option>
                                <option value="Rifiuti abbandonati" {{ $segnalazione->tipo == 'Rifiuti abbandonati' ? 'selected' : '' }}>Rifiuti abbandonati</option>
                                <option value="Cassonetti danneggiati" {{ $segnalazione->tipo == 'Cassonetti danneggiati' ? 'selected' : '' }}>Cassonetti danneggiati</option>
                                <option value="Mancato ritiro" {{ $segnalazione->tipo == 'Mancato ritiro' ? 'selected' : '' }}>Mancato ritiro</option>
                                <option value="Altro" {{ $segnalazione->tipo == 'Altro' ? 'selected' : '' }}>Altro</option>
                            </select>
                            <x-input-error :messages="$errors->get('tipo')" class="mt-2" />
                        </div>

                        <!-- Descrizione -->
                        <div>
                            <x-input-label for="descrizione" :value="__('Descrizione')" />
                            <textarea id="descrizione" name="descrizione" rows="4" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('descrizione', $segnalazione->descrizione) }}</textarea>
                            <p class="mt-1 text-sm text-gray-500">Descrivi dettagliatamente il problema riscontrato</p>
                            <x-input-error :messages="$errors->get('descrizione')" class="mt-2" />
                        </div>

                        <!-- Indirizzo -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="col-span-1 md:col-span-2">
                                <x-input-label for="via" :value="__('Via')" />
                                <x-text-input id="via" name="via" type="text" class="mt-1 block w-full" required value="{{ old('via', $segnalazione->via) }}" />
                                <x-input-error :messages="$errors->get('via')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="civico" :value="__('Numero Civico')" />
                                <x-text-input id="civico" name="civico" type="text" class="mt-1 block w-full" required value="{{ old('civico', $segnalazione->civico) }}" />
                                <x-input-error :messages="$errors->get('civico')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="cap" :value="__('CAP')" />
                                <x-text-input id="cap" name="cap" type="text" class="mt-1 block w-full" required value="{{ old('cap', $segnalazione->cap) }}" />
                                <x-input-error :messages="$errors->get('cap')" class="mt-2" />
                            </div>
                        </div>

                        <!-- Immagine -->
                        <div>
                            <x-input-label for="immagine" :value="__('Immagine (opzionale)')" />
                            <input type="file" id="immagine" name="immagine" accept="image/*" class="mt-1 block w-full text-sm text-gray-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-md file:border-0
                                file:text-sm file:font-semibold
                                file:bg-indigo-50 file:text-indigo-700
                                hover:file:bg-indigo-100"/>
                            @if($segnalazione->immagine)
                                <p class="mt-1 text-sm text-gray-500">Immagine attuale: <a href="{{ Storage::url($segnalazione->immagine) }}" target="_blank" class="text-blue-600 hover:text-blue-800">Visualizza</a></p>
                            @endif
                            <p class="mt-1 text-sm text-gray-500">Carica un'immagine per documentare il problema (max 2MB)</p>
                            <x-input-error :messages="$errors->get('immagine')" class="mt-2" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Salva Modifiche') }}</x-primary-button>
                            <a href="{{ route('segnalazioni.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 focus:bg-gray-400 active:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ __('Annulla') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 