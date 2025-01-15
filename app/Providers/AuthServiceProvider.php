<?php
namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Film;
use App\Models\Aktor;
use App\Models\Autor;
use App\Models\TypFilmu;
use App\Policies\AktorPolicy;
use App\Policies\AutorPolicy;
use App\Policies\FilmPolicy;
use App\Policies\TypFilmuPolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Film::class => FilmPolicy::class,
        Aktor::class => AktorPolicy::class,
        Autor::class => AutorPolicy::class,
        TypFilmu::class => TypFilmuPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}
