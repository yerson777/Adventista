<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Miembro;
class MiembroController extends Controller
{
    public function mostrarFormulario()
    {
        return view('miembros.crearMiembro');
    }
    public function mostrarFormularioEditar($id)
    {
        $miembro = Miembro::find($id);
        return view('miembros.editar', compact('miembro'));
    }
    


    public function crear(Request $request)
    {
        $miembro = new Miembro;
        $miembro->Nombre = $request->input('Nombre');
        $miembro->Apellido = $request->input('Apellido');
        $miembro->Fecha_Nacimiento = $request->input('Fecha_Nacimiento');
        $miembro->Direccion = $request->input('Direccion');
        $miembro->Telefono = $request->input('Telefono');
        $miembro->Correo = $request->input('Correo');
        $miembro->Rol = $request->input('Rol');
        $miembro->save();

        return back()->with('success', 'Miembro creado exitosamente');
    }


    public function listar(Request $request)
    {
        $miembros=Miembro::All();
        return view('miembros.listaMiembros', ['miembros' => $miembros]);
    }

    public function editar(Request $request, $id)
    {
        $miembro = Miembro::find($id);
        $miembro->Nombre = $request->input('Nombre');
        $miembro->Apellido = $request->input('Apellido');
        $miembro->Fecha_Nacimiento = $request->input('Fecha_Nacimiento');
        $miembro->Direccion = $request->input('Direccion');
        $miembro->Telefono = $request->input('Telefono');
        $miembro->Correo = $request->input('Correo');
        $miembro->Rol = $request->input('Rol');
        $miembro->save();
    
        return back()->with('success', 'Miembro  exitosamente');
    }
    


    public function eliminar($id)
    {
        $miembro = Miembro::find($id);
        
        if (!$miembro) {
            return back()->with('error', 'Miembro no encontrado');
        }
    
        $miembro->delete();
    
        return back()->with('success', 'Miembro eliminado exitosamente');
    }
    
    

}

    

