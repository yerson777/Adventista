@foreach($comentarios as $comentario)
<div class="modal fade" id="editarComentarioModal{{ $comentario->id }}" tabindex="-1" role="dialog" aria-labelledby="editarComentarioModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarComentarioModalLabel">Editar Comentario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('comentario.editar', ['id' => $comentario->id]) }}">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="texto_comentario">Texto del Comentario</label>
                        <input type="text" class="form-control" id="texto_comentario" name="texto_comentario" value="{{ $comentario->texto_comentario }}">
                    </div>
                    <div>
                        <label for="fecha_comentario">Fecha del Comentario</label>
                        <input type="date" class="form-control" id="fecha_comentario" name="fecha_comentario" value="{{ $comentario->fecha_comentario }}">
                    </div>
                    <div>
                        <label for="publicacion_id">Publicación</label>
                        <select class="form-control" id="publicacion_id" name="publicacion_id">
                            <option value="{{ $comentario->publicacion->id }}">{{ $comentario->publicacion->id }}</option>
                            @foreach($publicaciones as $publicacion)
                                <option value="{{ $publicacion->id }}">{{ $publicacion->titulo }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div>
                        <label for="autor_id">Autor</label>
                        <select class="form-control" id="autor_id" name="autor_id">
                            <option value="{{ $comentario->autor->id }}">{{ $comentario->autor->Nombre }}</option>
                            @foreach($miembros as $miembro)
                                <option value="{{ $miembro->id }}">{{ $miembro->Nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                 
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
@endforeach
