@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<div class="container">
<h1 style="color: #104F80; text-shadow: 2px 2px 4px #104F80; font-family: 'Arial', sans-serif; background: linear-gradient(to right, #343A40, #343A40); -webkit-background-clip: text; -webkit-text-fill-color: transparent; text-align: center;">Lista de Diezmos.</h1>
    <div class="card-body" style="background-color: #343a40; display: flex; justify-content: space-between; align-items: center; padding: 10px;">
        <div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#crearDiezmoModal">
                Crear Diezmo
            </button>
        </div>
        <div style="flex: 1; margin-left: 20px;">
            <input type="text" id="search" placeholder="Buscar..." style="width: 100%;">
        </div>
        <div style="margin-left: 20px;">
            <button type="button" class="btn btn-primary" onclick="searchFunction()">Buscar</button>
        </div>
    </div>

    @if($diezmos->count() > 0)
    <table class="table" id="diezmos-table" style="background-color: #A4D5DA;">
        <thead>
            <tr>
                <th>Fecha de Contribución</th>
                <th>Monto de Contribución</th>
                <th>Miembro</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="table-body">
            @foreach($diezmos as $diezmo)
            <tr>
                <td>{{ $diezmo->Fecha_Contribucion }}</td>
                <td>{{ $diezmo->Monto_Contribucion }}</td>
                <td>{{ $diezmo->miembro->Nombre }}</td>
                <td>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editarDiezmoModal{{ $diezmo->id }}">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eliminarDiezmoModal{{ $diezmo->id }}">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p style="color: #343a40;">No se encontraron diezmos.</p>
    @endif
</div>
@include('diezmos.crearDiezmo')
@include('diezmos.eliminarDiezmo')
@include('diezmos.editarDiezmo')
@endsection

@push('js')
<script>
    function searchFunction() {
        var input, filter, table, tr, tds, td, i, j, txtValue, found;
        input = document.getElementById("search");
        filter = input.value.toUpperCase();
        table = document.getElementById("diezmos-table");
        tr = table.getElementsByTagName("tr");
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
 