@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1 style="color: #104F80; text-shadow: 2px 2px 4px #104F80; font-family: 'Arial', sans-serif; background: linear-gradient(to right, #343A40, #343A40); -webkit-background-clip: text; -webkit-text-fill-color: transparent; text-align: center;">Lista de Departamentos.</h1>
<div class="card-body" style="background-color: #343a40; display: flex; justify-content: space-between; align-items: center; padding: 10px;">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#crearDepartamentoModal">
        Crear Departamento
    </button>
    <div style="flex: 1; margin-left: 20px;">
        <input type="text" id="searchDepartamento" placeholder="Buscar..." style="width: 100%;">
    </div>
    <div style="margin-left: 20px;">
        <button type="button" class="btn btn-primary" onclick="searchFunctionDepartamento()">Buscar</button>
    </div>
</div>

<div class="table-responsive">
    <table class="table" style="background-color: #A4D5DA;">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="departamentos-table-body">
            @foreach($departamentos as $departamento)
            <tr>
                <td>{{ $departamento->Nombre_Departamento }}</td>
                <td>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editarDepartamentoModal{{ $departamento->id }}">
                        <i class="fas fa-edit"></i>
                    </button>

                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eliminarDepartamentoModal{{ $departamento->id }}">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@include('departamentos.crearDepartamento')
@include('departamentos.editarDepartamento')
@include('departamentos.eliminarDepartamento')
@stop

@push('js')
<script>
    function searchFunctionDepartamento() {
        var input, filter, table, tr, tds, td, i, j, txtValue, found;
        input = document.getElementById("searchDepartamento");
        filter = input.value.toUpperCase();
        table = document.querySelector(".table");
        tr = document.querySelectorAll("#departamentos-table-body tr");
        for (i = 0; i < tr.length; i++) {
            tds = tr[i].getElementsByTagName("td");
            found = false;
            for (j = 0; j < tds.length; j++) {
                td = tds[j];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        found = true;
                        break;
                    }
                }
            }
            if (found) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
</script>
@endpush
