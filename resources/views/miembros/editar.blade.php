@foreach($miembros as $miembro)
        <!-- Modal de edición -->
        <div class="modal fade" id="EditarMiembroModal{{ $miembro->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Editar Miembro</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Formulario de edición -->
                        <form method="POST" action="{{ route('miembro.actualizar', ['id' => $miembro->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="Nombre">Nombre</label>
                                <input type="text" name="Nombre" id="Nombre" class="form-control" value="{{ $miembro->Nombre }}">
                            </div>
                            <div class="form-group">
                                <label for="Apellido">Apellido</label>
                                <input type="text" name="Apellido" id="Apellido" class="form-control" value="{{ $miembro->Apellido }}">
                            </div>
                            <div class="form-group">
                                <label for="Fecha_Nacimiento">Fecha de Nacimiento</label>
                                <input type="date" name="Fecha_Nacimiento" id="Fecha_Nacimiento" class="form-control" value="{{ $miembro->Fecha_Nacimiento }}">
                            </div>
                            <div class="form-group">
                                <label for="Direccion">Dirección</label>
                                <input type="text" name="Direccion" id="Direccion" class="form-control" value="{{ $miembro->Direccion }}">
                            </div>
                            <div class="form-group">
                                <label for="Telefono">Teléfono</label>
                                <input type="text" name="Telefono" id="Telefono" class="form-control" value="{{ $miembro->Telefono }}">
                            </div>
                            <div class="form-group">
                                <label for="Correo">Correo Electrónico</label>
                                <input type="email" name="Correo" id="Correo" class="form-control" value="{{ $miembro->Correo }}">
                            </div>
                            <div class="form-group">
                                <label for="Rol">Rol</label>
                                <select name="Rol" id="Rol" class="form-control">
                                    <option value="Administrador" {{ $miembro->Rol == 'Administrador'?'selected' : '' }}>Administrador</option>
                                    <option value="Usuario" {{ $miembro->Rol == 'Usuario'?'selected' : '' }}>Usuario</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach