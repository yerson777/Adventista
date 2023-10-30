<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\diezmo;
use App\Models\Miembro;

class DiezmoController extends Controller
{


    public function crearDiezmo(Request $request){
        
        $diezmo = new diezmo();
        $miembro = Miembro::pluck('Nombre', 'id');
        $diezmo->Fecha_Contribucion = $request->input('Fecha_Contribucion');
        $diezmo->Monto_Contribucion = $request->input('Monto_Contribucion');
        $diezmo->Miembro_id = $request->input('Miembro_id');
        $diezmo->save();
        return back()->with('success', 'Diezmo creado exitosamente');
    }

    public function listarDiezmo(Request $request){
        $diezmos = diezmo::all();
        return view('diezmos.listarDiezmo', ['diezmos' => $diezmos]);
    }

    public function editarDiezmo(Request $request, $id){
        $diezmo = diezmo::find($id);
        $miembro = Miembro::pluck('Nombre', 'id');
        $diezmo->Fecha_Contribucion = $request->input('Fecha_Contribucion');
        $diezmo->Monto_Contribucion = $request->input('Monto_Contribucion');
        $diezmo->Miembro_id = $request->input('Miembro_id');
        $diezmo->save();
        return back()->with('success', 'Diezmo editado exitosamente');
    }
    
    public function eliminarDiezmo(Request $request, $id){
        $diezmo = diezmo::find($id);
        $diezmo->delete();
        return back()->with('success', 'Diezmo eliminado exitosamente');
    }
}