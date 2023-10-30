<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class publicaciones extends Model
{
    use HasFactory;

    public function miembro()
    {
        return $this->belongsTo(Miembro::class, 'autor_id');
    }

    public function autor()
    {
        return $this->belongsTo(Miembro::class, 'autor_id');
    }
    
    protected $table = 'publicaciones';

    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'publicacion_id');
    }
}
