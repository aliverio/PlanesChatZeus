@section('title', __('Catalogo de Opciones'))
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-4">
                            <input wire:model='Filtro' type="text" class="form-control" name="search" id="search"
                            placeholder="Buscar">
                        </div>
                        <div class="col-4 text-center my-auto">
                            <h4 class="">Cuentas en ChatZeus </h4>
                        </div>
                        <div class="col-4 text-right">
                            
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @include('livewire.cuentas.update')
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead class="thead">
                                <tr>
                                    <th class="text-center">Descripcion</th>
                                    <th class="text-center">Licencia</th>
                                    <th class="text-center">Periodo</th>
                                    <th class="text-center">Fecha Inicio</th>
                                    <th class="text-center">Fecha Vencimiento</th>
                                    <th class="text-center" class="text-center">No. Usuarios</th>
                                    <th class="text-center" class="text-center">Estado Licencia</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cuentas as $row)
                                <tr>
                                    <td class="align-middle">
                                        <a data-toggle="modal" data-target="#updateModal" 
                                            class="btn btn-light mx-2"
                                            wire:click="editarCuenta({{$row->cuenta_id}})">
                                            <i class="material-icons color-zeus pt-1">badge</i>
                                        </a>    
                                        {{ $row->cuenta_descripcion }}
                                    </td>
                                    <td class="align-middle">
                                        <div class="btn btn-light mx-2">
                                            <i class="material-icons color-zeus pt-1">
                                                {{ $row->icono }}
                                            </i>
                                        </div> 
                                        {{ $row->plan_licenciamiento_descripcion }}
                                    </td>
                                    <td class="align-middle">
                                        {{ $row->licencia_periodo_descripcion ? $row->licencia_periodo_descripcion : "Ilimitado"}}
                                    </td>
                                    <td class="align-middle text-center">{{ \Carbon\Carbon::parse($row->fecha_inicio)->format('d/m/Y'); }}</td>
                                    <td class="align-middle text-center">{{ $row->fecha_vencimiento ? \Carbon\Carbon::parse($row->fecha_vencimiento)->format('d/m/Y'):''; }}</td>
                                    <td class="align-middle text-right">{{ $row->limite_usuarios }}</td>
                                    <td class="align-middle text-center"></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        {{ $cuentas->links('vendor.livewire.bootstrap') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
