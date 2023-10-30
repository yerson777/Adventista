<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;

class DepartamentoController extends Controller
{
    public function listarDepartamento(Request $request)
    {
        $departamentos = Departamento::all();
        return view('departamentos.listaDepartamentos', compact('departamentos'));
    }
    public function crearDepartamento(Request $request){
        $departamento = new Departamento;
        $departamento->Nombre_Departamento = $request->input('Nombre_Departamento');
        $departamento->save();

        return back()->with('success', 'Departamento creado exitosamente');
    }
    public function editarDepartamento(Request $request, $id)
    {
        $departamento = Departamento::find($id);
        
        if ($departamento) {
            $departamento->Nombre_Departamento = $request->input('Nombre_Departamento');
            $departamento->save();
            
            return back()->with('success', 'Departamento actualizado correctamente');
        } else {
            return back()->with('error', 'Departamento no encontrado');
        }
    }
    public function eliminarDepartamento($id)
    {
        $departamento = Departamento::find($id);
        
        if (!$departamento) {
            return back()->with('error', 'Miembro no encontrado');
        }
    
        $departamento->delete();
    
        return back()->with('success', 'Miembro eliminado exitosamente');
    }
}

