@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1 style="color: #104F80; text-shadow: 2px 2px 4px #104F80; font-family: 'Arial', sans-serif; background: linear-gradient(to right, #343A40, #343A40); -webkit-background-clip: text; -webkit-text-fill-color: transparent; text-align: center;">Lista de Miembros.</h1>
<div class="card-body" style="background-color: #343a40; display: flex; justify-content: space-between; align-items: center; padding: 10px;">

        <div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#crearMiembroModal">
                Crear Miembro
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
        <table class="table" id="miembros-table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Correo Electrónico</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="table-body">
                @foreach($miembros as $miembro)
                    <tr>
                        <td>{{ $miembro->Nombre }}</td>
                        <td>{{ $miembro->Apellido }}</td>
                        <td>{{ $miembro->Fecha_Nacimiento }}</td>
                        <td>{{ $miembro->Direccion }}</td>
                        <td>{{ $miembro->Telefono }}</td>
                        <td>{{ $miembro->Correo }}</td>
                        <td>{{ $miembro->Rol }}</td>
                        <td>
                            
                        <!-- Botón de edición con icono -->
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#EditarMiembroModal{{ $miembro->id }}">
                                <i class="fas fa-edit"></i> <!-- Icono de lápiz de Font Awesome -->
                            </button>

                            <!-- Botón de eliminación con icono -->
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eliminarMiembroModal{{ $miembro->id }}">
                                <i class="fas fa-trash-alt"></i> <!-- Icono de papelera de Font Awesome -->
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('miembros.crearMiembro')
@foreach($miembros as $miembro)
    @include('miembros.editar', ['miembro' => $miembro])
    @include('miembros.eliminar', ['miembro' => $miembro])
@endforeach

@stop

@push('js')
<script>
    function searchFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("search");
        filter = input.value.toUpperCase();
        table = document.getElementById("miembros-table");
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
