<!-- Modal -->
<div wire:ignore.self class="modal fade " id="updateModal" 
    data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
    aria-hidden="true" >
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
       <div class="modal-content">
            <div class="modal-header" style="background-color: #592c82;">
                <img src="{{ asset('img/logo_nube_blanca.png') }}" height="30" class="d-inline-block align-top" alt="">
                <h5 class="modal-title text-white ml-2 pt-1" id="exampleModalLabel">Actualización o Renovación de Licencia</h5>
                <button type="button" class="close text-white pt-3" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="SelectedId">
                    <div class="alert alert-secondary mb-0" role="alert">
                        <div class="row mb-0">
                            <div class="form-group col-4 mb-0">
                                <address>
                                    <strong>Descripción de Cuenta</strong><br>
                                    {{ $CuentaDescripcion_ }}
                                </address>
                            </div>
                            <div class="form-group col-4 mb-0">
                                <address>
                                    <strong>Plan de Licenciamiento</strong><br>
                                    {{$PlanLicenciamientoDescripcion_}}
                                </address>
                            </div>
                            <div class="form-group col-4 mb-0">
                                <address>
                                    <strong>No. de Usuarios</strong><br>
                                    {{$LimiteUsuarios_}}
                                </address>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="form-group col-4 mb-0">
                                <address class="mb-0">
                                    <strong>Periodo de Licencia</strong><br>
                                    {{ $LicenciaPeriodoDescripcion_ ? $LicenciaPeriodoDescripcion_ : "ILIMITADO"}}
                                </address>
                            </div>
                            <div class="form-group col-4 mb-0">
                                <address class="mb-0">
                                    <strong>Fecha Inicio</strong><br>
                                    {{$FechaInicio_}}
                                </address>
                            </div>
                            <div class="form-group col-4 mb-0">
                                <address class="mb-0">
                                    <strong>Fecha Vencimiento</strong><br>
                                    {{$FechaVencimiento_}}
                                </address>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="form-group col-4">
                            <label for="descripcion">Descripción de Cuenta</label>
                            <input wire:model="cuenta_nombre" type="text" class="form-control" 
                                id="cuenta_nombre" placeholder="Descripcion" readonly>
                        </div>
                        <div class="form-group col-4">
                            <label for="clave">Plan de Licenciamiento</label>
                            <input wire:model="descripcion" type="text" class="form-control" 
                                id="descripcion" placeholder="Plan de Licenciamiento" readonly>
                        </div>
                        <div class="form-group col-4">
                            <label for="clave">Periodo del Plan</label>
                            <input wire:model="licencia_periodo_descripcion" type="text" class="form-control" 
                                id="licencia_periodo_descripcion" placeholder="Periodo de Licencia"
                                readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-4">
                            <label for="clave">No. de Usuarios</label>
                            <input wire:model="limite_usuarios" type="text" 
                                class="form-control text-right" id="limite_usuarios" 
                                placeholder="Fecha de Inicio" readonly>
                        </div>
                        <div class="form-group col-4">
                            <label for="clave">Fecha Inicio</label>
                            <input wire:model="fecha_inicio" type="text" class="form-control" 
                                id="fecha_inicio" placeholder="Fecha de Inicio"
                                readonly>
                        </div>
                        <div class="form-group col-4">
                            <label for="clave">Fecha Vencimiento</label>
                            <input wire:model="fecha_vencimiento" type="text" class="form-control" 
                                id="fecha_vencimiento" placeholder="Fecha de Vencimiento"
                                readonly>
                        </div>
                    </div> --}}
                    <div class="card w-100 mt-1">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-4">
                                    <label for="plan_licenciamiento_id">Plan de Licenciamiento</label>
                                    <select class="custom-select" id="plan_licenciamiento_id"
                                        wire:model="PlanLicenciamientoId" autofocus>
                                        <option value="0">Seleccione Plan de Licenciamiento</option>
                                        @foreach ($plan_licencia as $key)
                                        <option value="{{ $key->plan_licenciamiento_id }}" 
                                            data-dias="{{ $key->cantidad_dias }}">
                                            {{ $key->descripcion }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-4">
                                    <label for="clave">No. de Usuarios</label>
                                    <input wire:model="LimiteUsuarios" type="number" 
                                        class="form-control text-right"
                                        {{ $UsuariosEditable }}
                                        placeholder="No. de Usuarios">
                                </div>
                                <div class="form-group col-4">
                                    <label for="fecha_inicio_aux">Fecha Inicio</label>
                                    <input wire:model="FechaInicio" type="date" 
                                        class="form-control text-right datepicker" 
                                        placeholder="Fecha de Inicio">
                                </div>
                                
                            </div>
                            <div class="row mb-0">
                                <div class="form-group col-4 mb-0">
                                    <label for="licencia_periodo_id">Periodo de Licencia</label>
                                    <select class="custom-select"
                                        wire:model="LicenciaPeriodoId">
                                        <option value="0">Seleccione Periodo de Licencia</option>
                                        @foreach ($licencia_periodos as $key)
                                        {{-- <option {{ $licencia_periodo_id == $key->licencia_periodo_id ? 'selected' : '' }}> --}}
                                        <option value="{{ $key->licencia_periodo_id }}" 
                                            data-dias="{{ $key->cantidad_dias }}">
                                            {{ $key->codigo.' -> '.$key->descripcion }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-4 mb-0">
                                    
                                </div>
                                <div class="form-group col-4 mb-0">
                                    <label for="clave">Fecha Vencimiento</label>
                                    <input wire:model="FechaVencimiento" type="date" 
                                        class="form-control text-right" 
                                        placeholder="Fecha de Vencimiento">
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="updatePlan()" 
                    class="btn btn-primary" data-dismiss="modal">Actualizar</button>
            </div>
       </div>
    </div>
</div>