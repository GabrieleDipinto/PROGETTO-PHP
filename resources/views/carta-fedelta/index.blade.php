<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('La Mia Carta Fedeltà') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Card principale della carta fedeltà -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Informazioni base -->
                        <div class="col-span-1">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Stato Carta</h3>
                            <div class="space-y-3">
                                <p class="text-sm text-gray-600">
                                    Numero Carta: <span class="font-medium">{{ str_pad($cartaFedelta->id, 8, '0', STR_PAD_LEFT) }}</span>
                                </p>
                                <p class="text-sm text-gray-600">
                                    Data Attivazione: <span class="font-medium">{{ $cartaFedelta->data_attivazione->format('d/m/Y') }}</span>
                                </p>
                                <p class="text-sm text-gray-600">
                                    Scadenza: <span class="font-medium">{{ $cartaFedelta->data_scadenza->format('d/m/Y') }}</span>
                                </p>
                                <p class="text-sm text-gray-600">
                                    Stato: 
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $cartaFedelta->isAttiva() ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $cartaFedelta->isAttiva() ? 'Attiva' : 'Scaduta' }}
                                    </span>
                                </p>
                            </div>
                        </div>

                        <!-- Punti e livello -->
                        <div class="col-span-1">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Punti e Livello</h3>
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <span class="text-3xl font-bold text-gray-900">{{ number_format($cartaFedelta->punti_accumulati) }}</span>
                                    <span class="ml-2 text-sm text-gray-500">punti totali</span>
                                </div>
                                <p class="text-sm text-gray-600">
                                    Livello attuale: 
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                        @if($livello === 'Platino') bg-purple-100 text-purple-800
                                        @elseif($livello === 'Oro') bg-yellow-100 text-yellow-800
                                        @elseif($livello === 'Argento') bg-gray-100 text-gray-800
                                        @else bg-blue-100 text-blue-800
                                        @endif">
                                        {{ $livello }}
                                    </span>
                                </p>
                                @if($puntiProssimoLivello > 0)
                                    <p class="text-sm text-gray-600">
                                        Punti per il prossimo livello: <span class="font-medium">{{ $puntiProssimoLivello }}</span>
                                    </p>
                                @endif
                            </div>
                        </div>

                        <!-- Vantaggi del livello -->
                        <div class="col-span-1">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Vantaggi {{ $livello }}</h3>
                            <ul class="space-y-2 text-sm text-gray-600">
                                @if($livello === 'Base')
                                    <li>• 1 punto ogni 10kg di rifiuti</li>
                                    <li>• Notifiche sullo stato dei ritiri</li>
                                @elseif($livello === 'Argento')
                                    <li>• 2 punti ogni 10kg di rifiuti</li>
                                    <li>• Priorità nella scelta degli orari</li>
                                    <li>• Notifiche personalizzate</li>
                                @elseif($livello === 'Oro')
                                    <li>• 3 punti ogni 10kg di rifiuti</li>
                                    <li>• Priorità massima nei ritiri</li>
                                    <li>• Assistenza dedicata</li>
                                    <li>• Report mensile sostenibilità</li>
                                @elseif($livello === 'Platino')
                                    <li>• 5 punti ogni 10kg di rifiuti</li>
                                    <li>• Servizio VIP con ritiro 24/7</li>
                                    <li>• Consulente personale</li>
                                    <li>• Report settimanale sostenibilità</li>
                                    <li>• Accesso eventi esclusivi</li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ultime prenotazioni completate -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Ultimi Punti Guadagnati</h3>
                    @if($ultimePrenotazioni->isEmpty())
                        <p class="text-gray-500">Non hai ancora completato nessuna prenotazione.</p>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo Rifiuto</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantità</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Punti</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($ultimePrenotazioni as $prenotazione)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $prenotazione->updated_at->format('d/m/Y') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $prenotazione->tipo_rifiuto }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $prenotazione->quantita }} m³
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                +{{ floor($prenotazione->quantita * 10) }} punti
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 