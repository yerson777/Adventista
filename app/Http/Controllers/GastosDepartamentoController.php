<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\gastosDepartamento;
use App\Models\Departamento;

class GastosDepartamentoController extends Controller
{
    public function listarGastosDepartamento(Request $request){
        $gastosDepartamento = gastosDepartamento::all();
        return view('gastos.listarGasto', ['gastosDepartamento' => $gastosDepartamento]);
    }

    public function crearGastoDepartamento(Request $request){

        $gastosDepartamento = new gastosDepartamento();
        $departamento = Departamento::pluck('Nombre_Departamento', 'id');
        $gastosDepartamento->departamento_id = $request->input('departamento_id');
        $gastosDepartamento->Fecha_del_Gastos = $request->input('Fecha_del_Gastos');
        $gastosDepartamento->Descripcion = $request->input('Descripcion');
        $gastosDepartamento->Monto_del_Gasto = $request->input('Monto_del_Gasto');
        $gastosDepartamento->save();

        return back()->with('success', 'Gasto creado exitosamente');
    }

    public function editarGastosDepartamento(Request $request, $id){

        $gastosDepartamento = gastosDepartamento::find($id);
        $departamento = Departamento::pluck('Nombre_Departamento', 'id');
        $gastosDepartamento->departamento_id = $request->input('departamento_id');
        $gastosDepartamento->Fecha_del_Gastos = $request->input('Fecha_del_Gastos');
        $gastosDepartamento->Descripcion = $request->input('Descripcion');
        $gastosDepartamento->Monto_del_Gasto = $request->input('Monto_del_Gasto');
        $gastosDepartamento->save();

        return back()->with('success', 'Gasto editado exitosamente');
    }

    public function eliminarGastosDepartamento(Request $request, $id){
        $gastosDepartamento = gastosDepartamento::find($id);
        $gastosDepartamento->delete();

        return back()->with('success', 'Gasto eliminado exitosamente');
    }
}
