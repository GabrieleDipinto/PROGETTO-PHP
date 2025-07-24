@php
    // Bootstrap 5 CDN (solo per questa pagina)
@endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="fw-bold display-6 text-dark mb-0">
            {{ __('La Mia Carta Fedeltà') }}
        </h2>
    </x-slot>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <div class="py-5 bg-light min-vh-100">
        <div class="container">
            <div class="d-flex justify-content-end mb-4">
                <a href="{{ route('premi') }}" class="btn btn-warning btn-lg fw-semibold shadow-sm">
                    <i class="bi bi-gift me-2"></i>Scopri i premi disponibili
                </a>
            </div>
            <div class="row g-4 mb-5">
                <!-- Card Stato Carta -->
                <div class="col-md-4">
                    <div class="card shadow-lg border-0 h-100">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-3 text-primary">Stato Carta</h5>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-2">Numero Carta: <span class="fw-bold">{{ str_pad($cartaFedelta->id, 8, '0', STR_PAD_LEFT) }}</span></li>
                                <li class="mb-2">Attivazione: <span class="fw-bold">{{ $cartaFedelta->data_attivazione->format('d/m/Y') }}</span></li>
                                <li class="mb-2">Scadenza: <span class="fw-bold">{{ $cartaFedelta->data_scadenza->format('d/m/Y') }}</span></li>
                                <li class="mb-2">Stato: <span class="badge {{ $cartaFedelta->isAttiva() ? 'bg-success' : 'bg-danger' }}">{{ $cartaFedelta->isAttiva() ? 'Attiva' : 'Scaduta' }}</span></li>
                            </ul>
                            <div class="mb-2">
                                <span class="fw-semibold">Saldo carta:</span>
                                <span class="badge bg-warning text-dark fs-5 ms-2">€ {{ number_format($cartaFedelta->saldo_euro, 2, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card Punti e Obiettivo -->
                <div class="col-md-4">
                    <div class="card shadow-lg border-0 h-100">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-3 text-primary">Punti e Obiettivo Premio</h5>
                            <div class="mb-3">
                                <span class="display-5 fw-bold text-dark">{{ number_format($cartaFedelta->punti_accumulati) }}</span>
                                <span class="ms-2 text-secondary">punti</span>
                            </div>
                            <div class="mb-2">
                                Livello attuale:
                                <span class="badge 
                                    @if($livello === 'Platino') bg-purple text-white
                                    @elseif($livello === 'Oro') bg-warning text-dark
                                    @elseif($livello === 'Argento') bg-secondary text-white
                                    @else bg-info text-white
                                    @endif">
                                    {{ $livello }}
                                </span>
                            </div>
                            @php
                                $prossimiPremi = [1500 => 10, 2000 => 15, 5000 => 25];
                                $punti = $cartaFedelta->punti_accumulati;
                                $target = null;
                                foreach(array_keys($prossimiPremi) as $soglia) {
                                    if($punti < $soglia) { $target = $soglia; break; }
                                }
                            @endphp
                            @if($target)
                                <div class="mb-2">
                                    <div class="d-flex justify-content-between mb-1">
                                        <span class="text-muted small">Prossimo premio: <span class="fw-bold">{{ $prossimiPremi[$target] }}€</span></span>
                                        <span class="text-muted small">{{ $punti }}/{{ $target }} punti</span>
                                    </div>
                                    <div class="progress" style="height: 1.5rem;">
                                        <div class="progress-bar bg-warning text-dark fw-bold" role="progressbar" style="width: {{ min(100, round($punti/$target*100)) }}%" aria-valuenow="{{ $punti }}" aria-valuemin="0" aria-valuemax="{{ $target }}">{{ min(100, round($punti/$target*100)) }}%</div>
                                    </div>
                                    <span class="text-muted small">Ti mancano <span class="fw-bold">{{ $target - $punti }}</span> punti per riscattare un buono da {{ $prossimiPremi[$target] }}€</span>
                                </div>
                            @else
                                <div class="mb-2">
                                    <span class="text-success fw-semibold">Hai raggiunto il massimo premio disponibile!</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- Card Vantaggi -->
                <div class="col-md-4">
                    <div class="card shadow-lg border-0 h-100">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-3 text-primary">Vantaggi {{ $livello }}</h5>
                            <ul class="list-unstyled text-start mx-auto" style="max-width: 250px;">
                                <li>• 1 punto ogni 1 kg di rifiuti conferiti</li>
                                <li>• Notifiche sullo stato dei ritiri</li>
                                <li>• Premi riscattabili a 1500, 2000, 5000 punti</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Ultime prenotazioni completate -->
            <div class="card shadow-lg border-0 mt-5">
                <div class="card-body">
                    <h5 class="card-title mb-4 text-primary">Ultimi Punti Guadagnati</h5>
                    @if($ultimePrenotazioni->isEmpty())
                        <p class="text-muted">Non hai ancora completato nessuna prenotazione.</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-striped align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>Data</th>
                                        <th>Tipo Rifiuto</th>
                                        <th>Quantità</th>
                                        <th>Punti</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ultimePrenotazioni as $prenotazione)
                                        <tr>
                                            <td>{{ $prenotazione->updated_at->format('d/m/Y') }}</td>
                                            <td>{{ $prenotazione->tipo_rifiuto }}</td>
                                            <td>{{ $prenotazione->quantita }} kg</td>
                                            <td>+{{ $prenotazione->quantita }} punti</td>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</x-app-layout> 