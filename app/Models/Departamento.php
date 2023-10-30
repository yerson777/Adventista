<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    
    protected $fillable = ['Nombre_Departamento'];

    public function miembrosAsignados()
    {
        return $this->hasMany(Asignacion_miembros::class);
    }

    public function gastos(){
        return $this->hasMany(Gastos_Departamento::class);
    }
}
