<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dettagli Prenotazione') }}
            </h2>
            <a href="{{ route('prenotazioni.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                {{ __('Torna alla Lista') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Informazioni Prenotazione</h3>
                            <dl class="grid grid-cols-1 gap-4">
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Stato</dt>
                                    <dd class="mt-1">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            @if($prenotazione->stato === 'in_attesa') bg-yellow-100 text-yellow-800
                                            @elseif($prenotazione->stato === 'confermata') bg-green-100 text-green-800
                                            @elseif($prenotazione->stato === 'completata') bg-blue-100 text-blue-800
                                            @else bg-red-100 text-red-800
                                            @endif">
                                            {{ ucfirst(str_replace('_', ' ', $prenotazione->stato)) }}
                                        </span>
                                    </dd>
                                </div>

                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Data Ritiro</dt>
                                    <dd class="mt-1 text-sm text-gray-900">
                                        {{ \Carbon\Carbon::parse($prenotazione->data_ritiro)->format('d/m/Y') }}
                                    </dd>
                                </div>

                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Tipo di Rifiuto</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $prenotazione->tipo_rifiuto }}</dd>
                                </div>

                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Quantità</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $prenotazione->quantita }} m³</dd>
                                </div>

                                @if($prenotazione->note)
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500">Note</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $prenotazione->note }}</dd>
                                    </div>
                                @endif

                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Data Prenotazione</dt>
                                    <dd class="mt-1 text-sm text-gray-900">
                                        {{ $prenotazione->created_at->format('d/m/Y H:i') }}
                                    </dd>
                                </div>
                            </dl>
                        </div>

                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Azioni Disponibili</h3>
                            <div class="space-y-4">
                                @if($prenotazione->stato === 'in_attesa')
                                    <form action="{{ route('prenotazioni.destroy', $prenotazione) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-full inline-flex justify-center items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150" onclick="return confirm('Sei sicuro di voler cancellare questa prenotazione?')">
                                            {{ __('Cancella Prenotazione') }}
                                        </button>
                                    </form>
                                    <p class="text-sm text-gray-500 mt-2">
                                        Puoi cancellare questa prenotazione perché è ancora in attesa di conferma.
                                    </p>
                                @else
                                    <p class="text-sm text-gray-500">
                                        Non sono disponibili azioni per questa prenotazione nel suo stato attuale.
                                        @if($prenotazione->stato === 'confermata')
                                            La prenotazione è stata confermata e verrà gestita secondo la data stabilita.
                                        @elseif($prenotazione->stato === 'completata')
                                            La prenotazione è stata completata con successo.
                                        @elseif($prenotazione->stato === 'annullata')
                                            La prenotazione è stata annullata.
                                        @endif
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 