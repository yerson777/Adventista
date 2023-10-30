<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comentario;
use App\Models\publicaciones;
use App\Models\Miembro;

class ComentarioController extends Controller
{
    public function crearComentario(Request $request){
        $comentario = new comentario();
        $publicacion= publicaciones::pluck('id');
        $miembro = Miembro::pluck('Nombre', 'id');
        $comentario-> texto_comentario = $request->input('texto_comentario');
        $comentario-> publicacion_id = $request->input('publicacion_id');
        $comentario-> autor_id = $request->input('autor_id');
        $comentario-> fecha_comentario = $request->input('fecha_comentario');
        $comentario->save();
        return back()->with('success', 'Comentario creado exitosamente');
    }
    public function listarComentarios(){
        $comentarios = comentario::all();
        return view('comentarios.listarComentarios', compact('comentarios'));
    }
    public function editarComentario(Request $request, $id){
        $comentario = comentario::find($id);
        $publicacion= publicaciones::pluck('id');
        $miembro = Miembro::pluck('Nombre', 'id');
        $comentario-> texto_comentario = $request->input('texto_comentario');
        $comentario-> publicacion_id = $request->input('publicacion_id');
        $comentario-> autor_id = $request->input('autor_id');
        $comentario-> fecha_comentario = $request->input('fecha_comentario');
        $comentario->save();
        return back()->with('success', 'Comentario editado exitosamente');
    }
    public function eliminarComentario(Request $request, $id){
        $comentario = comentario::find($id);
        $comentario->delete();
        return back()->with('success', 'Comentario eliminado exitosamente');
    }

    
}
