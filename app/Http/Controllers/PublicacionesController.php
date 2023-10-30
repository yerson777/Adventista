<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publicaciones;
use App\Models\Miembro;

class PublicacionesController extends Controller
{
    public function crearPublicacion(Request $request){
        $publicacion = new Publicaciones();
        $miembro = Miembro::pluck('Nombre', 'id');

        $publicacion-> fecha_publicacion  = $request->input('fecha_publicacion');
        $publicacion-> Descripción = $request->input('Descripción');

        if ($request->hasFile('Contenido_multimedia')) {
            $file = $request->file('Contenido_multimedia');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/multimedia/', $name);
            $publicacion->Contenido_multimedia = asset('multimedia/' . $name); // Almacena la URL de la imagen
        }
    
        if ($request->hasFile('Imagen')) {
            $file = $request->file('Imagen');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/imagenes/', $name);
            $publicacion->Imagen = asset('imagenes/' . $name); // Almacena la URL de la imagen
        }
        $publicacion-> autor_id = $request->input('autor_id');
        $publicacion->save();
        return back()->with('success', 'Publicación creada exitosamente');
    }

    public function listarPublicacion(Request $request){
        $publicacion = Publicaciones::all();
        return view('publicaciones.listarPublicaciones', ['publicacion' => $publicacion]);
    }

    public function editarPublicacion(Request $request, $id){
        $publicacion = Publicaciones::find($id);
        $miembro = Miembro::pluck('Nombre', 'id');
        $publicacion-> fecha_publicacion  = $request->input('fecha_publicacion');
        $publicacion-> Descripción = $request->input('Descripción');
        if ($request->hasFile('Contenido_multimedia')) {
            $file = $request->file('Contenido_multimedia');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/multimedia/', $name);
            $publicacion->Contenido_multimedia = url('/multimedia/' . $name); // Captura la URL
        }
        
        if ($request->hasFile('Imagen')) {
            $file = $request->file('Imagen');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/imagenes/', $name);
            $publicacion->Imagen = url('/imagenes/' . $name); // Captura la URL
        }
        
        //$publicacion-> Miembro_id = $request->input('Miembro_id');
        $publicacion->save();
        return back()->with('success', 'Publicación editada exitosamente');
    }

    public function eliminarPublicacion(Request $request, $id){
        $publicacion = Publicaciones::find($id);
        $publicacion->delete();
        return back()->with('success', 'Publicación eliminada exitosamente');
    }

}
