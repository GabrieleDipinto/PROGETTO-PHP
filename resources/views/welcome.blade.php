<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>EcoRitiro - Sistema di Gestione Rifiuti Smart</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            .hero-pattern {
                background-color: rgba(0, 0, 0, 0.5);
                background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1532996122724-e3c354a0b15b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1920&q=80');
                background-size: cover;
                background-position: center;
                background-attachment: fixed;
            }

            .stats-gradient {
                background: linear-gradient(90deg, #059669 0%, #10B981 100%);
            }

            .feature-card {
                transition: transform 0.3s ease-in-out;
            }

            .feature-card:hover {
                transform: translateY(-5px);
            }

            .eco-icon {
                color: #059669;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="min-h-screen bg-gray-50">
            <!-- Navigation -->
            <nav class="bg-white shadow-lg">
                <div class="max-w-7xl mx-auto px-4">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <div class="flex-shrink-0 flex items-center">
                                <h1 class="text-2xl font-bold text-green-600">EcoRitiro</h1>
                            </div>
                        </div>
                        <div class="flex items-center">
                            @if (Route::has('login'))
                                <div class="space-x-4">
                                    @auth
                                        <a href="{{ url('/dashboard') }}" class="text-gray-700 hover:text-green-600">Dashboard</a>
                                    @else
                                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-green-600">Accedi</a>
                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}" class="ml-4 text-gray-700 hover:text-green-600">Registrati</a>
                                        @endif
                                    @endauth
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Hero Section with Background -->
            <div class="hero-pattern">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
                    <div class="text-center">
                        <h2 class="text-4xl tracking-tight font-extrabold text-white sm:text-5xl md:text-6xl">
                            <span class="block">Ritiro Rifiuti</span>
                            <span class="block text-green-400">a Domicilio</span>
                        </h2>
                        <p class="mt-3 max-w-md mx-auto text-base text-gray-300 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
                            Prenota il ritiro dei tuoi rifiuti comodamente da casa. Servizio efficiente, tracciabile e premiante con il nostro programma fedeltà.
                        </p>
                        <div class="mt-5 max-w-md mx-auto sm:flex sm:justify-center md:mt-8">
                            @guest
                                <div class="rounded-md shadow">
                                    <a href="{{ route('register') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-green-600 hover:bg-green-700 md:py-4 md:text-lg md:px-10">
                                        Inizia Ora
                                    </a>
                                </div>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Section -->
            <div class="stats-gradient py-12">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-4 py-4">
                        <div class="text-center">
                            <p class="text-3xl font-bold text-white">95%</p>
                            <p class="mt-2 text-white">Clienti Soddisfatti</p>
                        </div>
                        <div class="text-center">
                            <p class="text-3xl font-bold text-white">24/7</p>
                            <p class="mt-2 text-white">Supporto Online</p>
                        </div>
                        <div class="text-center">
                            <p class="text-3xl font-bold text-white">+5000</p>
                            <p class="mt-2 text-white">Ritiri Completati</p>
                        </div>
                        <div class="text-center">
                            <p class="text-3xl font-bold text-white">-30%</p>
                            <p class="mt-2 text-white">Impatto Ambientale</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Come Funziona Section -->
            <div class="py-12 bg-white">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="lg:text-center">
                        <h2 class="text-base text-green-600 font-semibold tracking-wide uppercase">Processo Semplice</h2>
                        <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                            Come Funziona
                        </p>
                    </div>

                    <div class="mt-10">
                        <div class="space-y-10 md:space-y-0 md:grid md:grid-cols-3 md:gap-x-8 md:gap-y-10">
                            <div class="relative feature-card bg-white p-6 rounded-lg shadow-lg">
                                <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-green-500 text-white">
                                    1
                                </div>
                                <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Registrati</p>
                                <p class="mt-2 ml-16 text-base text-gray-500">
                                    Crea il tuo account con i tuoi dati personali per accedere a tutti i servizi.
                                </p>
                            </div>

                            <div class="relative feature-card bg-white p-6 rounded-lg shadow-lg">
                                <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-green-500 text-white">
                                    2
                                </div>
                                <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Prenota</p>
                                <p class="mt-2 ml-16 text-base text-gray-500">
                                    Scegli tipo di rifiuto, quantità e data preferita per il ritiro.
                                </p>
                            </div>

                            <div class="relative feature-card bg-white p-6 rounded-lg shadow-lg">
                                <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-green-500 text-white">
                                    3
                                </div>
                                <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Monitora</p>
                                <p class="mt-2 ml-16 text-base text-gray-500">
                                    Segui lo stato della tua prenotazione e accumula punti fedeltà.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Servizi Section -->
            <div class="bg-gray-50 py-12">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="lg:text-center mb-10">
                        <h2 class="text-base text-green-600 font-semibold tracking-wide uppercase">I Nostri Servizi</h2>
                        <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                            Tutto ciò di cui hai bisogno
                        </p>
                    </div>

                    <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                        <div class="feature-card bg-white p-6 rounded-lg shadow-lg">
                            <div class="text-center">
                                <div class="h-12 w-12 mx-auto mb-4">
                                    <svg class="h-full w-full eco-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </div>
                                <h3 class="text-lg font-medium text-gray-900">Prenotazione Ritiri</h3>
                                <p class="mt-4 text-base text-gray-500">
                                    Prenota il ritiro dei rifiuti ingombranti online. Scegli data e orario, modifica o cancella le prenotazioni non confermate.
                                </p>
                            </div>
                        </div>

                        <div class="feature-card bg-white p-6 rounded-lg shadow-lg">
                            <div class="text-center">
                                <div class="h-12 w-12 mx-auto mb-4">
                                    <svg class="h-full w-full eco-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                </div>
                                <h3 class="text-lg font-medium text-gray-900">Segnalazioni</h3>
                                <p class="mt-4 text-base text-gray-500">
                                    Invia segnalazioni e monitora il loro stato. Rimani aggiornato su ogni fase della gestione.
                                </p>
                            </div>
                        </div>

                        <div class="feature-card bg-white p-6 rounded-lg shadow-lg">
                            <div class="text-center">
                                <div class="h-12 w-12 mx-auto mb-4">
                                    <svg class="h-full w-full eco-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <h3 class="text-lg font-medium text-gray-900">Carta Fedeltà</h3>
                                <p class="mt-4 text-base text-gray-500">
                                    Accumula punti ad ogni ritiro effettuato. Monitora il tuo saldo e lo stato della carta.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Certificazioni Section -->
            <div class="bg-white py-12">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="lg:text-center mb-10">
                        <h2 class="text-base text-green-600 font-semibold tracking-wide uppercase">Le Nostre Certificazioni</h2>
                        <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                            Standard di Qualità
                        </p>
                    </div>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-8 items-center justify-items-center">
                        <div class="grayscale hover:grayscale-0 transition-all bg-white p-4 rounded-lg shadow-sm hover:shadow-md">
                            <img src="{{ asset('images/certifications/iso14001.png') }}" alt="ISO 14001" class="h-16">
                        </div>
                        <div class="grayscale hover:grayscale-0 transition-all bg-white p-4 rounded-lg shadow-sm hover:shadow-md">
                            <img src="{{ asset('images/certifications/iso9001.png') }}" alt="ISO 9001" class="h-16">
                        </div>
                        <div class="grayscale hover:grayscale-0 transition-all bg-white p-4 rounded-lg shadow-sm hover:shadow-md">
                            <img src="{{ asset('images/certifications/emas.png') }}" alt="EMAS" class="h-16">
                        </div>
                        <div class="grayscale hover:grayscale-0 transition-all bg-white p-4 rounded-lg shadow-sm hover:shadow-md">
                            <img src="{{ asset('images/certifications/iso45001.png') }}" alt="ISO 45001" class="h-16">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mappa Section -->
            <div class="bg-white dark:bg-gray-800 py-12">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="lg:text-center mb-10">
                        <h2 class="text-base text-green-600 font-semibold tracking-wide uppercase">I Nostri Centri</h2>
                        <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 dark:text-white sm:text-4xl">
                            Punti di Raccolta
                        </p>
                        <p class="mt-4 max-w-2xl text-xl text-gray-500 dark:text-gray-400 lg:mx-auto">
                            Trova il punto di raccolta più vicino a te. Visualizza orari, servizi disponibili e stato in tempo reale.
                        </p>
                    </div>

                    <div class="mt-10">
                        <x-google-map class="w-full h-[500px] rounded-lg shadow-lg" />
                    </div>

                    <!-- Legend -->
                    <div class="mt-6 grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="flex items-center space-x-2">
                            <div class="w-4 h-4 bg-green-500 rounded-full"></div>
                            <span class="text-sm text-gray-600 dark:text-gray-400">Centro Principale</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-4 h-4 bg-blue-500 rounded-full"></div>
                            <span class="text-sm text-gray-600 dark:text-gray-400">Isola Ecologica</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-4 h-4 bg-yellow-500 rounded-full"></div>
                            <span class="text-sm text-gray-600 dark:text-gray-400">Centro Raccolta</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-4 h-4 bg-purple-500 rounded-full"></div>
                            <span class="text-sm text-gray-600 dark:text-gray-400">Punto Raccolta</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="bg-gray-800">
                <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                        <div class="col-span-1 md:col-span-2">
                            <h2 class="text-2xl font-bold text-white mb-4">EcoRitiro</h2>
                            <p class="text-gray-400">
                                Leader nel settore della gestione dei rifiuti, offriamo soluzioni innovative e sostenibili per la raccolta differenziata.
                            </p>
                        </div>
                        <div>
                            <h3 class="text-white font-semibold mb-4">Contatti</h3>
                            <ul class="space-y-2 text-gray-400">
                                <li>Email: info@ecoritiro.it</li>
                                <li>Tel: 800 123 456</li>
                                <li>P.IVA: 12345678901</li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="text-white font-semibold mb-4">Certificazioni</h3>
                            <ul class="space-y-2 text-gray-400">
                                <li>ISO 14001:2015</li>
                                <li>ISO 9001:2015</li>
                                <li>EMAS III</li>
                                <li>ISO 45001:2018</li>
                            </ul>
                        </div>
                    </div>
                    <div class="mt-8 border-t border-gray-700 pt-8">
                        <p class="text-center text-base text-gray-400">
                            &copy; 2025 EcoRitiro. Tutti i diritti riservati.
                        </p>
                    </div>
                </div>
            </footer>
        </div>

    <!-- Google Maps Script -->
    <script>
        let map;
        let markers = [];
        let infoWindows = [];
        
        function initMap() {
            // Centro iniziale della mappa (Roma)
            const center = { lat: 41.9028, lng: 12.4964 };
            
            const mapOptions = {
                zoom: 11,
                center: center,
                styles: [
                    {
                        "featureType": "poi",
                        "elementType": "labels",
                        "stylers": [
                            { "visibility": "off" }
                        ]
                    }
                ]
            };

            // Applica il tema scuro se necessario
            if (document.documentElement.classList.contains('dark')) {
                mapOptions.styles = [
                    { elementType: "geometry", stylers: [{ color: "#242f3e" }] },
                    { elementType: "labels.text.stroke", stylers: [{ color: "#242f3e" }] },
                    { elementType: "labels.text.fill", stylers: [{ color: "#746855" }] },
                    {
                        featureType: "administrative.locality",
                        elementType: "labels.text.fill",
                        stylers: [{ color: "#d59563" }],
                    },
                    {
                        featureType: "poi",
                        elementType: "labels.text.fill",
                        stylers: [{ color: "#d59563" }],
                    },
                    {
                        featureType: "poi.park",
                        elementType: "geometry",
                        stylers: [{ color: "#263c3f" }],
                    },
                    {
                        featureType: "poi.park",
                        elementType: "labels.text.fill",
                        stylers: [{ color: "#6b9a76" }],
                    },
                    {
                        featureType: "road",
                        elementType: "geometry",
                        stylers: [{ color: "#38414e" }],
                    },
                    {
                        featureType: "road",
                        elementType: "geometry.stroke",
                        stylers: [{ color: "#212a37" }],
                    },
                    {
                        featureType: "road",
                        elementType: "labels.text.fill",
                        stylers: [{ color: "#9ca5b3" }],
                    },
                    {
                        featureType: "road.highway",
                        elementType: "geometry",
                        stylers: [{ color: "#746855" }],
                    },
                    {
                        featureType: "road.highway",
                        elementType: "geometry.stroke",
                        stylers: [{ color: "#1f2835" }],
                    },
                    {
                        featureType: "road.highway",
                        elementType: "labels.text.fill",
                        stylers: [{ color: "#f3d19c" }],
                    },
                    {
                        featureType: "transit",
                        elementType: "geometry",
                        stylers: [{ color: "#2f3948" }],
                    },
                    {
                        featureType: "transit.station",
                        elementType: "labels.text.fill",
                        stylers: [{ color: "#d59563" }],
                    },
                    {
                        featureType: "water",
                        elementType: "geometry",
                        stylers: [{ color: "#17263c" }],
                    },
                    {
                        featureType: "water",
                        elementType: "labels.text.fill",
                        stylers: [{ color: "#515c6d" }],
                    },
                    {
                        featureType: "water",
                        elementType: "labels.text.stroke",
                        stylers: [{ color: "#17263c" }],
                    },
                ];
            }
            
            map = new google.maps.Map(document.getElementById("map"), mapOptions);

            // Richiedi la posizione dell'utente
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        const pos = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude,
                        };
                        
                        // Aggiungi marker per la posizione dell'utente
                        new google.maps.Marker({
                            position: pos,
                            map: map,
                            icon: {
                                path: google.maps.SymbolPath.CIRCLE,
                                scale: 10,
                                fillColor: "#4F46E5",
                                fillOpacity: 1,
                                strokeWeight: 2,
                                strokeColor: "#FFFFFF",
                            },
                            title: "La tua posizione"
                        });

                        map.setCenter(pos);
                        map.setZoom(12);
                    },
                    () => {
                        console.log("Geolocalizzazione negata");
                    }
                );
            }

            // Carica i punti di raccolta dall'API
            fetch('/api/punti-raccolta')
                .then(response => response.json())
                .then(puntiRaccolta => {
                    puntiRaccolta.forEach(punto => {
                        // Determina il colore del marker in base al tipo
                        let markerColor;
                        switch(punto.tipo) {
                            case 'centro principale':
                                markerColor = '#22C55E'; // green-500
                                break;
                            case 'isola ecologica':
                                markerColor = '#3B82F6'; // blue-500
                                break;
                            case 'centro raccolta':
                                markerColor = '#EAB308'; // yellow-500
                                break;
                            default:
                                markerColor = '#A855F7'; // purple-500
                        }

                        const marker = new google.maps.Marker({
                            position: { lat: punto.latitudine, lng: punto.longitudine },
                            map: map,
                            title: punto.nome,
                            icon: {
                                path: google.maps.SymbolPath.CIRCLE,
                                scale: 8,
                                fillColor: markerColor,
                                fillOpacity: 1,
                                strokeWeight: 2,
                                strokeColor: "#FFFFFF",
                            }
                        });

                        const servizi = punto.servizi.map(s => 
                            `<span class="inline-block px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800 mr-1 mb-1">${s}</span>`
                        ).join('');

                        const infowindow = new google.maps.InfoWindow({
                            content: `
                                <div class="p-2">
                                    <h3 class="font-bold text-lg mb-2">${punto.nome}</h3>
                                    <p class="text-sm mb-1"><strong>Indirizzo:</strong> ${punto.indirizzo}</p>
                                    <p class="text-sm mb-1"><strong>Orario:</strong> ${punto.orario_apertura} - ${punto.orario_chiusura}</p>
                                    <p class="text-sm mb-2"><strong>Stato:</strong> 
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                            ${punto.stato}
                                        </span>
                                    </p>
                                    <div class="mt-2">
                                        <p class="text-sm font-semibold mb-1">Servizi disponibili:</p>
                                        <div class="flex flex-wrap">
                                            ${servizi}
                                        </div>
                                    </div>
                                </div>
                            `
                        });

                        marker.addListener("click", () => {
                            // Chiudi tutte le finestre info aperte
                            infoWindows.forEach(iw => iw.close());
                            infowindow.open(map, marker);
                        });

                        markers.push(marker);
                        infoWindows.push(infowindow);
                    });
                })
                .catch(error => console.error('Errore nel caricamento dei punti di raccolta:', error));
        }

        // Aggiorna la mappa quando cambia il tema
        document.addEventListener('DOMContentLoaded', function() {
            const observer = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    if (mutation.attributeName === 'class') {
                        if (map) {
                            initMap();
                        }
                    }
                });
            });

            observer.observe(document.documentElement, {
                attributes: true
            });
        });
    </script>
</body>
</html>
