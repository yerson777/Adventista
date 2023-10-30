@section('content')
<div class="modal fade" id="crearMiembroModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Crear Nuevo Miembro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('miembro.guardar') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="Nombre">Nombre</label>
                        <input type="text" class="form-control" id="Nombre" name="Nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="Apellido">Apellido</label>
                        <input type="text" class="form-control" id="Apellido" name="Apellido" required>
                    </div>
                    <div class="form-group">
                        <label for="Fecha_Nacimiento">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" id="Fecha_Nacimiento" name="Fecha_Nacimiento" required>
                    </div>
                    <div class="form-group">
                        <label for="Direccion">Dirección</label>
                        <input type="text" class="form-control" id="Direccion" name="Direccion" required>
                    </div>
                    <div class="form-group">
                        <label for="Telefono">Teléfono</label>
                        <input type="text" class="form-control" id="Telefono" name="Telefono" required>
                    </div>
                    <div class="form-group">
                        <label for="Correo">Correo Electrónico</label>
                        <input type="email" class="form-control" id="Correo" name="Correo" required>
                    </div>
                    <div class="form-group">
                        <label for="Rol">Rol</label>
                        <select class="form-control" id="Rol" name="Rol" required>
                            <option value="Administrador">Administrador</option>
                            <option value="Cliente">Cliente</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar Miembro</button>
                </form>
            </div>
        </div>
    </div>

</div>

@stop
