<div class="modal fade" id="crearDiezmoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Crear Nuevo Diezmo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('diesmo.crear') }}">
                    @csrf
                    <div class="form-group">
                        <label for="Fecha_Contribucion">Fecha de Contribución</label>
                        <input type="date" name="Fecha_Contribucion" id="Fecha_Contribucion" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="Monto_Contribucion">Monto de Contribución</label>
                        <input type="number" name="Monto_Contribucion" id="Monto_Contribucion" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="Miembro_id">Miembro</label>
                        <select name="Miembro_id" id="Miembro_id" class="form-control">
                            @foreach($miembros as $miembro)
                                <option value="{{ $miembro->id }}">{{ $miembro->Nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Crear Diezmo</button>
                </form>
            </div>
        </div>
    </div>
</div>
