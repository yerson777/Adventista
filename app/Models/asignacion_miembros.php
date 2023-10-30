<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class asignacion_miembros extends Model
{
    use HasFactory;


    public function departamento()
    {
        return $this->belongsTo('App\Models\Departamento', 'departamento_id');
    }

    public function miembro()
    {
        return $this->belongsTo('App\Models\Miembro', 'miembro_id');
    }

    
}
