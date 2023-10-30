@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1 style="color: #104F80; text-shadow: 2px 2px 4px #104F80; font-family: 'Arial', sans-serif; background: linear-gradient(to right, #343A40, #343A40); -webkit-background-clip: text; -webkit-text-fill-color: transparent; text-align: center;">Lista de Comentarios.</h1>
    <div class="card-body" style="background-color: #343a40; display: flex; justify-content: space-between; align-items: center; padding: 10px;">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#crearComentarioModal">
            Crear Comentario
        </button>
        <div style="flex: 1; margin-left: 20px;">
            <input type="text" id="search" placeholder="Buscar..." style="width: 100%;">
        </div>
        <div style="margin-left: 20px;">
            <button type="button" class="btn btn-primary" onclick="searchFunction()">Buscar</button>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table" style="background-color: #A4D5DA;">
            <thead>
                <tr>
                    <th>Publicación</th>
                    <th>Autor</th>
                    <th>Fecha del Comentario</th>
                    <th>Texto del Comentario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="comentarios-table-body">
                @foreach($comentarios as $comentario)
                    <tr>
                        <td>{{ $comentario->publicacion->id }}</td> 
                        <td>{{ $comentario->autor->Nombre }}</td> 
                        <td>{{ $comentario->fecha_comentario }}</td>
                        <td>{{ $comentario->texto_comentario }}</td>
                        <td>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editarComentarioModal{{ $comentario->id }}">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eliminarComentarioModal{{ $comentario->id }}">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('comentarios.crearComentarios')
@include('comentarios.editarComentarios')
@include('comentarios.eliminarComentarioss')
@stop

@push('js')
<script>
    function searchFunction() {
        var input, filter, table, tr, tds, td, i, j, txtValue, found;
        input = document.getElementById("search");
        filter = input.value.toUpperCase();
        table = document.querySelector(".table");
        tr = document.querySelectorAll("#comentarios-table-body tr");
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
