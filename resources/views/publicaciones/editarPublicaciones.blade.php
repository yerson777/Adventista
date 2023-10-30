@foreach($publicaciones as $publicacion)
    <div class="modal fade" id="editarPublicacionModal{{ $publicacion->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Editar Publicación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('publicaciones.editar', ['id' => $publicacion->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="autor_id">Autor</label>
                            <select name="autor_id" id="autor_id" class="form-control">
                                @foreach($miembros as $miembro)
                                    <option value="{{ $miembro->id }}">{{ $miembro->Nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="fecha_publicacion">Fecha de publicación</label>
                            <input type="date" name="fecha_publicacion" id="fecha_publicacion" class="form-control" value="{{ $publicacion->fecha_publicacion }}" required>
                        </div>
                        <div class="form-group">
                            <label for="Descripción">Descripción</label>
                            <input type="text" name="Descripción" id="Descripción" class="form-control" value="{{ $publicacion->Descripcion }}" required>
                        </div>
                        <div class="form-group">
                            <label for="Contenido_multimedia">Contenido multimedia (Imagenes o Videos)</label>
                            <input type="file" name="Contenido_multimedia" id="Contenido_multimedia" accept="image/*, video/*" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Imagen">Imagen</label>
                            <input type="file" name="Imagen" id="Imagen" accept="image/*" class="form-control">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
