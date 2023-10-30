<!-- Modal de edición -->
<div class="modal fade"  id="editarDepartamentoModal{{ $departamento->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                        <form method="POST" action="{{ route('departamento.editar', ['id' => $departamento->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="Nombre_Departamento">Nombre</label>
                                <input type="text" name="Nombre_Departamento" id="Nombre_Departamento" class="form-control" value="{{ $departamento->Nombre }}">
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>