<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\asignacion_miembros;
use App\Models\Miembro;
use App\Models\Departamento;
class AsisnacionMiembrosController extends Controller
{

    public function crearAsignacion(Request $request)
    {
        $asignacion = new asignacion_miembros();
        $miembro = Miembro::pluck('Nombre', 'id');
        $departamento = Departamento::pluck('Nombre_Departamento', 'id');
        $asignacion-> fecha_Asignacion = $request->input('fecha_asignacion');
        $asignacion->Rol = $request->input('Rol');
        $asignacion->Departamento_id = $request->input('Departamento_id');
        $asignacion->Miembro_id = $request->input('Miembro_id');
        $asignacion->save();
        return back()->with('success', 'Asignacion creada exitosamente');
    }
    public function eliminarAsignacion($id)
    {
        $asignacion = asignacion_miembros::find($id);
    
        if ($asignacion) {
            $asignacion->delete();
            return back()->with('success', 'Asignación eliminada exitosamente');
        } else {
            return back()->with('error', 'La asignación no se encontró');
        }
    }
    


    public function listarAsignacion(Request $request)
    {
        $asignaciones = asignacion_miembros::all();
        return view('asignacionDepartamentos.listaAsignaciones', ['asignaciones' => $asignaciones]);
    }

    public function editarAsignacion(Request $request, $id){
        $asignacion = asignacion_miembros::find($id);
        $miembro = Miembro::pluck('Nombre', 'id');
        $departamento = Departamento::pluck('Nombre_Departamento', 'id');
        $asignacion-> fecha_Asignacion = $request->input('fecha_asignacion');
        $asignacion->Rol = $request->input('Rol');
        $asignacion->Departamento_id = $request->input('Departamento_id');
        $asignacion->Miembro_id = $request->input('Miembro_id');
        $asignacion->save();
        return back()->with('success', 'Asignación editada exitosamente');
    }
}
