@extends('layouts.app')
@section('navbar')
    @include('livewire.general.navbar')
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header" style="background-color: #592c82;">
                    {{-- <img src="{{ asset('img/logo_nube_blanca.png') }}" height="30" class="d-inline-block align-top" alt=""> --}}
                    <h5 class="modal-title text-white ml-2 pt-1" id="exampleModalLabel">Actualización o Renovación de Licencia</h5>
                </div>
                <div class="card-body">
                    <form wire:click="guardar()" >
                        <input type="text" wire:model="cuenta_id">
                        <div class="alert alert-secondary mb-0" role="alert">
                            <div class="row mb-0">
                                <div class="form-group col-4 mb-0">
                                    <address>
                                        <strong>Descripción de Cuenta</strong><br>
                                        {{ $cuenta_descripcion_ }}
                                    </address>
                                </div>
                                <div class="form-group col-4 mb-0">
                                    <address>
                                        <strong>Plan de Licenciamiento</strong><br>
                                        {{$plan_licenciamiento_descripcion_}}
                                    </address>
                                </div>
                                <div class="form-group col-4 mb-0">
                                    <address>
                                        <strong>No. de Usuarios</strong><br>
                                        {{$limite_usuarios_}}
                                    </address>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="form-group col-4 mb-0">
                                    <address class="mb-0">
                                        <strong>Periodo de Licencia</strong><br>
                                        {{ $licencia_periodo_descripcion_ ? $licencia_periodo_descripcion_ : "Ilimitado"}}
                                    </address>
                                </div>
                                <div class="form-group col-4 mb-0">
                                    <address class="mb-0">
                                        <strong>Fecha Inicio</strong><br>
                                        {{$fecha_inicio_}}
                                    </address>
                                </div>
                                <div class="form-group col-4 mb-0">
                                    <address class="mb-0">
                                        <strong>Fecha Vencimiento</strong><br>
                                        {{$fecha_vencimiento_}}
                                    </address>
                                </div>
                            </div>
                        </div>

                        <div class="card w-100 mt-1">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-4">
                                        <label>Plan de Licenciamiento</label>
                                        <select class="custom-select" wire:model="selectPlan" autofocus>
                                            <option value="0">Seleccione Plan de Licenciamiento</option>
                                            @foreach ($plan_licencia as $key)
                                                <option value="{{ $key->plan_licenciamiento_id }}">
                                                    {{ $key->descripcion }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-4">
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="clave">No. de Usuarios</label>
                                        <input wire:model="limite_usuarios" type="number" 
                                            class="form-control text-right" id="limite_usuarios_aux" 
                                            {{ $usuarios_editable }}
                                            placeholder="No. de Usuarios">
                                    </div>
                                    
                                </div>
                                <div class="row mb-0">
                                    <div class="form-group col-4 mb-0">
                                        <label for="licencia_periodo_id">Periodo de Licencia</label>
                                        <select class="custom-select" id="licencia_periodo_id"
                                            wire:model="selectPeriodo">
                                            <option value="0">Seleccione Periodo de Licencia</option>
                                            @foreach ($licencia_periodos as $key)
                                            <option {{ $licencia_periodo_id == $key->licencia_periodo_id ? 'selected' : '' }}>
                                                {{ $key->codigo.' -> '.$key->descripcion }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-4 mb-0">
                                        <label for="fecha_inicio_aux">Fecha Inicio</label>
                                        <input wire:model="fecha_inicio" type="date" 
                                            class="form-control text-right" 
                                            placeholder="Fecha de Inicio">
                                    </div>
                                    <div class="form-group col-4 mb-0">
                                        <label for="clave">Fecha Vencimiento</label>
                                        <input wire:model="fecha_vencimiento" type="date" 
                                            class="form-control text-right" 
                                            placeholder="Fecha de Vencimiento">
                                    </div>
                                </div>
                            </div>
                        </div>
                         <button type="button" 
                        class="btn btn-primary">Actualizar</button>
                    </form>
                </div>
                <div class="card-footer">
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection