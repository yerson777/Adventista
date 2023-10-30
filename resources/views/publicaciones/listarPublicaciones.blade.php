@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<div class="container">
<h1 style="color: #104F80; text-shadow: 2px 2px 4px #104F80; font-family: 'Arial', sans-serif; background: linear-gradient(to right, #343A40, #343A40); -webkit-background-clip: text; -webkit-text-fill-color: transparent; text-align: center;">Lista de Publicaciones.</h1>
    <div class="card-body" style="background-color: #343a40; display: flex; justify-content: space-between; align-items: center; padding: 10px;">
        <div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#crearPublicacionModal">
                Crear Publicación
            </button>
        </div>
        <div style="flex: 1; margin-left: 20px;">
            <input type="text" id="search" placeholder="Buscar..." style="width: 100%;">
        </div>
        <div style="margin-left: 20px;">
            <button type="button" class="btn btn-primary" onclick="searchFunction()">Buscar</button>
        </div>
    </div>

    @if($publicacion->count() > 0)
    <table class="table" id="publicaciones-table" style="background-color: #A4D5DA;">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID del Autor</th>
                <th>Fecha de Publicación</th>
                <th>Descripción</th>
                <th>Contenido Multimedia</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="table-body">
            @foreach($publicacion as $publicacion)
            <tr>
                <td>{{ $publicacion->id }}</td>
                <td>{{ $publicacion->autor->Nombre }}</td>
                <td>{{ $publicacion->fecha_publicacion }}</td>
                <td>{{ $publicacion->Descripción }}</td>
                <td>
                    <img src="{{ $publicacion->Contenido_multimedia }}" alt="Contenido Multimedia" width="50cm" height="50cm">
                    <img src="{{ $publicacion->Imagen }}" alt="Imagen" width="50cm" height="50cm">
                </td>
                <td>
                    <img src="{{ $publicacion->Imagen }}" alt="Imagen" width="50m" height="50cm">
                </td>
                <td>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editarPublicacionModal{{ $publicacion->id }}">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eliminarPublicacionModal{{ $publicacion->id }}">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p style="color: #343a40;">No se encontraron publicaciones.</p>
    @endif
</div>
@include('publicaciones.crearPublicaciones')
@include('publicaciones.editarPublicaciones')
@include('publicaciones.eliminarPublicacion')

@endsection

@push('js')
<script>
    function searchFunction() {
        var input, filter, table, tr, tds, td, i, j, txtValue, found;
        input = document.getElementById("search");
        filter = input.value.toUpperCase();
        table = document.getElementById("publicaciones-table");
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
