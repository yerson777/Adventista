@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 style="color: #104F80; text-shadow: 2px 2px 4px #104F80; font-family: 'Arial', sans-serif; background: linear-gradient(to right, #343A40, #343A40); -webkit-background-clip: text; -webkit-text-fill-color: transparent; text-align: center;">Lista de Asignaciones</h1>
    <div class="card-body" style="background-color: #343a40; display: flex; justify-content: space-between; align-items: center; padding: 10px;">
        <div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#crearAsignacionModal">
                Crear Asignación
            </button>
        </div>
        <div style="flex: 1; margin-left: 20px;">
            <input type="text" id="search" placeholder="Buscar..." style="width: 100%;">
        </div>
        <div style="margin-left: 20px;">
            <button type="button" class="btn btn-primary" onclick="searchFunction()">Buscar</button>
        </div>
    </div>

    <div class="table-responsive" style="background-color: #A4D5DA;">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Departamento</th>
                    <th>Miembro</th>
                    <th>Fecha Asignación</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($asignaciones as $asignacione)
                    <tr>
                        <td>{{ $asignacione->id }}</td>
                        <td>{{ $asignacione->departamento->Nombre_Departamento }}</td>
                        <td>{{ $asignacione->miembro->Nombre }}</td>
                        <td>{{ $asignacione->fecha_Asignacion }}</td>
                        <td>{{ $asignacione->Rol }}</td>
                        <td>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editarAsignacionModal{{ $asignacione->id }}">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $asignacione->id }}">
                                 <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('asignacionDepartamentos.crearAsignaciones')
@foreach($asignaciones as $asignacione)
    @include('asignacionDepartamentos.editarAsignacion', ['asignacione' => $asignacione])
    @include('asignacionDepartamentos.eliminarAsignacion', ['asignacione' => $asignacione])
@endforeach

@stop

@push('js')
<script>
    function searchFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("search");
        filter = input.value.toUpperCase();
        table = document.getElementsByTagName("table")[0];
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            tds = tr[i].getElementsByTagName("td");
            var found = false;
            for (var j = 0; j < tds.length; j++) {
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
