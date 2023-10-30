@foreach($gastosDepartamento as $gasto)
<div class="modal fade" id="editarGastoModal{{ $gasto->id }}" tabindex="-1" role="dialog" aria-labelledby="editarGastoModalLabel{{ $gasto->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarGastoModalLabel{{ $gasto->id }}">Editar Gasto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('gasto.editar', ['id' => $gasto->id]) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="Departamento_id">Departamento</label>
                                <select name="departamento_id" id="Departamento_id" class="form-control">
                                    @foreach($departamentos as $departamento)
                                        <option value="{{ $departamento->id }}" @if($departamento->id == $gasto->departamento_id) selected @endif>{{ $departamento->Nombre_Departamento }}</option>
                                    @endforeach
                                </select>
                        </div>

                        <div class="form-group">
                            <label for="Fecha_del_Gastos">Fecha del Gasto</label>
                            <input type="date" class="form-control" id="Fecha_del_Gastos" name="Fecha_del_Gastos" value="{{ $gasto->Fecha_del_Gastos }}">
                        </div>
                        <div class="form-group">
                            <label for="Descripcion">Descripción</label>
                            <textarea class="form-control" id="Descripcion" name="Descripcion" rows="3">{{ $gasto->Descripcion }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="Monto_del_Gasto">Monto del Gasto</label>
                            <input type="number" class="form-control" id="Monto_del_Gasto" name="Monto_del_Gasto" value="{{ $gasto->Monto_del_Gasto }}">
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
@endforeach

