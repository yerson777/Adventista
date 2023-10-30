    
    <div class="modal fade" id="crearComentarioModal" tabindex="-1" role="dialog" aria-labelledby="crearComentarioModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crearComentarioModalLabel">Crear Comentario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('comentario.crear') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="texto_comentario">Texto del Comentario</label>
                            <textarea class="form-control" id="texto_comentario" name="texto_comentario" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="publicacion_id">Publicación</label>
                            <select class="form-control" id="publicacion_id" name="publicacion_id">
                                @foreach($publicaciones as $publicacion)
                                    <option value="{{ $publicacion->id }}">{{ $publicacion->id}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="autor_id">Autor</label>
                            <select name="autor_id" id="autor_id" class="form-control">
                                @foreach($miembro as $miembros)
                                    <option value="{{ $miembros->id }}">{{ $miembros->Nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="fecha_comentario">Fecha del Comentario</label>
                            <input type="date" class="form-control" id="fecha_comentario" name="fecha_comentario">
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

