@foreach($diezmos as $diezmo)
<div class="modal fade" id="editarDiezmoModal{{ $diezmo->id }}" tabindex="-1" role="dialog" aria-labelledby="editarDiezmoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarDiezmoModalLabel">Editar Diezmo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('diezmo.editar', ['id' => $diezmo->id]) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="Fecha_Contribucion">Fecha de Contribución</label>
                        <input type="date" name="Fecha_Contribucion" id="Fecha_Contribucion" class="form-control" value="{{ $diezmo->Fecha_Contribucion }}" required>
                    </div>

                    <div class="form-group">
                        <label for="Monto_Contribucion">Monto de Contribución</label>
                        <input type="number" name="Monto_Contribucion" id="Monto_Contribucion" class="form-control" value="{{ $diezmo->Monto_Contribucion }}" required>
                    </div>

                    <div class="form-group">
                        <label for="Miembro_id">Miembro</label>
                        <select name="Miembro_id" id="Miembro_id" class="form-control">
                            @foreach($miembros as $miembro)
                                <option value="{{ $miembro->id }}"{{ $diezmo->Miembro_id == $miembro->id ? 'selected' : '' }}>
                                    {{ $miembro->Nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
