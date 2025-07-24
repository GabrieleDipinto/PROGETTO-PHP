<?php

namespace App\Providers;

use App\Models\Prenotazione;
use App\Policies\PrenotazionePolicy;
use App\Models\Segnalazione;
use App\Policies\SegnalazionePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Prenotazione::class => PrenotazionePolicy::class,
        Segnalazione::class => SegnalazionePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
} 