<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Sezione Profilo -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">I tuoi dati personali:</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="font-medium">Nome:</p>
                            <p class="text-gray-600">{{ auth()->user()->nome }}</p>
                        </div>
                        <div>
                            <p class="font-medium">Cognome:</p>
                            <p class="text-gray-600">{{ auth()->user()->cognome }}</p>
                        </div>
                        <div>
                            <p class="font-medium">Email:</p>
                            <p class="text-gray-600">{{ auth()->user()->email }}</p>
                        </div>
                        <div>
                            <p class="font-medium">Telefono:</p>
                            <p class="text-gray-600">{{ auth()->user()->telefono }}</p>
                        </div>
                        <div>
                            <p class="font-medium">Indirizzo:</p>
                            <p class="text-gray-600">{{ auth()->user()->via }}, {{ auth()->user()->civico }}</p>
                        </div>
                        <div>
                            <p class="font-medium">CAP:</p>
                            <p class="text-gray-600">{{ auth()->user()->cap }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sezione Azioni Rapide -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Card Prenotazione -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Prenotazione Ritiro</h3>
                        <p class="text-gray-600 mb-4">Prenota il ritiro dei tuoi rifiuti ingombranti o speciali.</p>
                        <a href="{{ route('prenotazioni.create') }}" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Nuova Prenotazione
                        </a>
                    </div>
                </div>

                <!-- Card Segnalazione -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Segnalazione</h3>
                        <p class="text-gray-600 mb-4">Segnala disservizi o problemi relativi alla raccolta rifiuti.</p>
                        <a href="{{ route('segnalazioni.create') }}" class="inline-flex items-center px-4 py-2 bg-yellow-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-700 focus:bg-yellow-700 active:bg-yellow-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Nuova Segnalazione
                        </a>
                    </div>
                </div>
            </div>

            <!-- Sezione Storico -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Ultime Prenotazioni -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold text-gray-900">Ultime Prenotazioni</h3>
                            <a href="{{ route('prenotazioni.index') }}" class="text-sm text-blue-600 hover:text-blue-800">Vedi tutte</a>
                        </div>
                        <div class="space-y-4">
                            @forelse(auth()->user()->prenotazioni()->latest('data_ritiro')->take(3)->get() as $prenotazione)
                                <div class="border-b pb-4">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <p class="font-medium">{{ $prenotazione->tipo_rifiuto }}</p>
                                            <p class="text-sm text-gray-600">Data ritiro: {{ \Carbon\Carbon::parse($prenotazione->data_ritiro)->format('d/m/Y') }}</p>
                                            <p class="text-sm text-gray-600">Quantità: {{ $prenotazione->quantita }} m³</p>
                                        </div>
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            @if($prenotazione->stato === 'in_attesa') bg-yellow-100 text-yellow-800
                                            @elseif($prenotazione->stato === 'confermata') bg-green-100 text-green-800
                                            @elseif($prenotazione->stato === 'completata') bg-blue-100 text-blue-800
                                            @else bg-red-100 text-red-800
                                            @endif">
                                            {{ ucfirst(str_replace('_', ' ', $prenotazione->stato)) }}
                                        </span>
                                    </div>
                                </div>
                            @empty
                                <p class="text-gray-500">Non hai ancora effettuato nessuna prenotazione.</p>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Ultime Segnalazioni -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold text-gray-900">Ultime Segnalazioni</h3>
                            <a href="{{ route('segnalazioni.index') }}" class="text-sm text-blue-600 hover:text-blue-800">Vedi tutte</a>
                        </div>
                        <div class="space-y-4">
                            @forelse(auth()->user()->segnalazioni()->latest()->take(3)->get() as $segnalazione)
                                <div class="border-b pb-4">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <p class="font-medium">{{ $segnalazione->tipo }}</p>
                                            <p class="text-sm text-gray-600">{{ Str::limit($segnalazione->descrizione, 100) }}</p>
                                            <p class="text-sm text-gray-600">Indirizzo: {{ $segnalazione->via }}, {{ $segnalazione->civico }} - {{ $segnalazione->cap }}</p>
                                            @if($segnalazione->immagine)
                                                <p class="text-sm text-gray-600 mt-1">
                                                    <a href="{{ Storage::url($segnalazione->immagine) }}" target="_blank" class="text-blue-600 hover:text-blue-800">
                                                        Visualizza immagine
                                                    </a>
                                                </p>
                                            @endif
                                        </div>
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            @if($segnalazione->stato === 'in_attesa') bg-yellow-100 text-yellow-800
                                            @elseif($segnalazione->stato === 'in_lavorazione') bg-blue-100 text-blue-800
                                            @elseif($segnalazione->stato === 'risolta') bg-green-100 text-green-800
                                            @else bg-gray-100 text-gray-800
                                            @endif">
                                            {{ ucfirst(str_replace('_', ' ', $segnalazione->stato)) }}
                                        </span>
                                    </div>
                                </div>
                            @empty
                                <p class="text-gray-500">Non hai ancora effettuato nessuna segnalazione.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
