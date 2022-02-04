<!-- Modal -->
<div wire:ignore.self class="modal fade " id="startupModal" 
    data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
    aria-hidden="true">
    <div class="modal-dialog" role="document" style="margin-top: 90px;">
       <div class="modal-content">
            <div class="modal-header" style="background-color: #592c82;">
                <i class="material-icons text-white pt-1">rocket_launch</i>
                <h5 class="modal-title text-white ml-2 pt-1" id="exampleModalLabel">Licenciamiento StartUp</h5>
                <button type="button" class="close text-white pt-3" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="row">
                        <div class="form-group col-8">
                            <label for="descripcion">Periodo de Licencia</label>
                            <select class="custom-select" id="inlineFormCustomSelectPref">
                                @foreach ($licencia_periodos as $key)
                                <option value="{{ $key->licencia_periodo_id }}" 
                                    data-dias="{{ $key->cantidad_dias }}">
                                    {{ $key->codigo.' -> '.$key->descripcion }}</option>
                                @endforeach
                              </select>
                        </div>
                        <div class="form-group col-4">
                            <label for="clave">No. de Usuarios</label>
                            <input wire:model="limite_usuarios" type="number" 
                                class="form-control text-right" 
                                id="limite_usuarios" placeholder="Limite de Usuarios" readonly>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="fecha_inicio">Fecha Inicio</label>
                            <input wire:model="fecha_inicio" type="date" class="form-control" 
                                id="fecha_inicio" placeholder="Fecha de Inicio">
                        </div>
                        <div class="form-group col-6">
                            <label for="fecha_vencimiento">Fecha Vencimiento</label>
                            <input wire:model="fecha_vencimiento" type="date" class="form-control" 
                                id="fecha_vencimiento" placeholder="Fecha de Vencimiento">
                        </div>
                    </div> 
            </form>
            </div>
            <div class="modal-footer">
                <div class="row col-6">
                    {{-- wire:click.prevent="update()"  --}}
                    <button type="button" 
                        class="btn btn-outline-zeus w-100" data-dismiss="modal">
                        Aceptar
                    </button>
                </div>
            </div>
       </div>
    </div>
</div>