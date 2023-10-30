<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Miembro extends Model
{
    use HasFactory;
    protected $table ='miembros';


    
    public function usuarios()
    {
        return $this->belongsTo(Usuarios::class);
    }

    public function asignacionesDepartamentos()
    {
        return $this->hasMany(Asignacion_miembros::class);
    }

    public function diezmos(){
        return $this->hasMany(Diesmos::class);
    }

    public function publicacion(){
        return $this->hasMany(Publicaciones::class);
    }

    //public function comentarios(){
     //   return $this->hasMany(Comentarios::class);
   // }

    

    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'autor_id');
    }

}
