<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Premi Carta Fedeltà') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-8 text-center">
                <h3 class="text-lg font-semibold text-gray-700">Raggiungi i traguardi e riscatta i tuoi premi!</h3>
                <p class="text-gray-500 mt-2">Accumula punti con le tue prenotazioni e scegli il premio che preferisci.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Premio 1 -->
                <div class="bg-white shadow-lg rounded-lg p-8 flex flex-col items-center hover:shadow-2xl transition border-t-4 border-yellow-400">
                    <div class="mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3zm0 10c-4.418 0-8-1.79-8-4V6a2 2 0 012-2h12a2 2 0 012 2v8c0 2.21-3.582 4-8 4z" /></svg>
                    </div>
                    <h4 class="text-xl font-bold mb-2 text-yellow-500">10€ Buono</h4>
                    <p class="text-gray-600 mb-4 text-center">Raggiungi <span class="font-semibold">1500 punti</span> e ricevi un buono da 10€ da spendere nei nostri partner.</p>
                    <span class="inline-block bg-yellow-100 text-yellow-800 px-4 py-1 rounded-full text-xs font-semibold">1500 punti</span>
                </div>
                <!-- Premio 2 -->
                <div class="bg-white shadow-lg rounded-lg p-8 flex flex-col items-center hover:shadow-2xl transition border-t-4 border-yellow-600">
                    <div class="mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3zm0 10c-4.418 0-8-1.79-8-4V6a2 2 0 012-2h12a2 2 0 012 2v8c0 2.21-3.582 4-8 4z" /></svg>
                    </div>
                    <h4 class="text-xl font-bold mb-2 text-yellow-600">15€ Buono</h4>
                    <p class="text-gray-600 mb-4 text-center">Raggiungi <span class="font-semibold">2000 punti</span> e ricevi un buono da 15€ da spendere nei nostri partner.</p>
                    <span class="inline-block bg-yellow-200 text-yellow-900 px-4 py-1 rounded-full text-xs font-semibold">2000 punti</span>
                </div>
                <!-- Premio 3 -->
                <div class="bg-white shadow-lg rounded-lg p-8 flex flex-col items-center hover:shadow-2xl transition border-t-4 border-yellow-800">
                    <div class="mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-yellow-800" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3zm0 10c-4.418 0-8-1.79-8-4V6a2 2 0 012-2h12a2 2 0 012 2v8c0 2.21-3.582 4-8 4z" /></svg>
                    </div>
                    <h4 class="text-xl font-bold mb-2 text-yellow-800">25€ Buono</h4>
                    <p class="text-gray-600 mb-4 text-center">Raggiungi <span class="font-semibold">5000 punti</span> e ricevi un buono da 25€ da spendere nei nostri partner.</p>
                    <span class="inline-block bg-yellow-300 text-yellow-900 px-4 py-1 rounded-full text-xs font-semibold">5000 punti</span>
                </div>
            </div>
            <div class="mt-12 max-w-md mx-auto">
                @if(session('success'))
                    <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif
                @if(session('error'))
                    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                @endif
                <form method="POST" action="{{ route('premi.riscatta') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    @csrf
                    <label for="premio" class="block text-gray-700 font-bold mb-2">Scegli il premio da riscattare:</label>
                    <select id="premio" name="premio" class="block w-full mb-4 border-gray-300 rounded shadow-sm">
                        <option value="">-- Seleziona un premio --</option>
                        <option value="10">10€ (1500 punti)</option>
                        <option value="15">15€ (2000 punti)</option>
                        <option value="25">25€ (5000 punti)</option>
                    </select>
                    <button type="submit" class="w-full px-4 py-2 bg-yellow-500 text-white font-semibold rounded shadow hover:bg-yellow-600 transition">Riscatta premio</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout> 