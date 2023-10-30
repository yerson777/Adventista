<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Miembro;
use App\Models\Departamento;
use App\Models\asignacion_miembros;
use App\Models\publicaciones;
use App\Models\diezmo;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->share('departamentos', Departamento::all());
        view()->share('departamento', Departamento::all());
        view()->share('miembros', Miembro::all());
        view()->share('asignacion', asignacion_miembros::all());
        view()->share('nombreAutor',Miembro::all());
        view()->share('miembro',Miembro::all());
        view()->share('publicaciones',publicaciones::all());
        view()->share('diezmo', diezmo::all());
        
        
    }
}
