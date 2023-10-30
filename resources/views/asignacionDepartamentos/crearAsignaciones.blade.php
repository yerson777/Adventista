@section('content')
<div class="modal fade" id="crearAsignacionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Crear Nueva Asignacion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('asignacion.guardar') }}">
                    @csrf
                    <div class="form-group">
                        <label for="fecha_asignacion">Fecha de Asignacion</label>
                        <input type="date" name="fecha_asignacion" id="fecha_asignacion" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="Rol">Rol</label>
                        <select name="Rol" id="Rol" class="form-control" required>
                            <option value="Director del Departamento">Director del Departamento</option>
                            <option value="Miembro">Miembro</option>
                            <option value="Sub Director">Sub Director</option>
                            <option value="Secretario">Secretario</option>
                        </select>
                    </div>
                    <div class="form-group">
                    <label for="Departamento_id">Departamento</label>
                    <select name="Departamento_id" id="Departamento_id" class="form-control">
                        @foreach($departamentos as $departamento)
                            <option value="{{ $departamento->id }}">{{ $departamento->Nombre_Departamento }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="Miembro_id">Miembro</label>
                    <select name="Miembro_id" id="Miembro_id" class="form-control">
                        @foreach($miembros as $miembro)
                            <option value="{{ $miembro->id }}">{{ $miembro->Nombre }}</option>
                        @endforeach
                    </select>
                </div>

                    <button type="submit" class="btn btn-primary">Crear</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop