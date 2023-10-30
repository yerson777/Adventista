<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comentario extends Model
{
    use HasFactory;
    
    public function miembro(){
        return $this->belongsTo(Miembros::class);
    }

    protected $table = 'comentarios';

    public function publicacion()
    {
        return $this->belongsTo(publicaciones::class, 'publicacion_id');
    }

    public function autor()
    {
        return $this->belongsTo(Miembro::class, 'autor_id');
    }

}
