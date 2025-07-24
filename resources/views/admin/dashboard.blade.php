<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Pannello di Controllo Amministratore') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Prenotazioni -->
                <div class="bg-white shadow-lg rounded-lg p-8 flex flex-col items-center hover:shadow-2xl transition">
                    <div class="mb-4 text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                    </div>
                    <h3 class="text-lg font-bold mb-2">Prenotazioni</h3>
                    <p class="text-gray-500 mb-4 text-center">Gestisci e approva tutte le prenotazioni degli utenti.</p>
                    <a href="{{ route('admin.prenotazioni') }}" class="px-6 py-2 bg-blue-600 text-white font-semibold rounded shadow hover:bg-blue-700 transition">Vai alle Prenotazioni</a>
                </div>
                <!-- Segnalazioni -->
                <div class="bg-white shadow-lg rounded-lg p-8 flex flex-col items-center hover:shadow-2xl transition">
                    <div class="mb-4 text-yellow-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M12 8v.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                    <h3 class="text-lg font-bold mb-2">Segnalazioni</h3>
                    <p class="text-gray-500 mb-4 text-center">Visualizza, approva e risolvi tutte le segnalazioni ricevute.</p>
                    <a href="{{ route('admin.segnalazioni') }}" class="px-6 py-2 bg-yellow-500 text-white font-semibold rounded shadow hover:bg-yellow-600 transition">Vai alle Segnalazioni</a>
                </div>
                <!-- Lista Utenti -->
                <div class="bg-white shadow-lg rounded-lg p-8 flex flex-col items-center hover:shadow-2xl transition">
                    <div class="mb-4 text-green-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87M16 3.13a4 4 0 010 7.75M8 3.13a4 4 0 010 7.75" /></svg>
                    </div>
                    <h3 class="text-lg font-bold mb-2">Lista Utenti</h3>
                    <p class="text-gray-500 mb-4 text-center">Consulta l'elenco completo degli utenti registrati.</p>
                    <a href="{{ route('admin.utenti') }}" class="px-6 py-2 bg-green-600 text-white font-semibold rounded shadow hover:bg-green-700 transition">Vai alla Lista Utenti</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 