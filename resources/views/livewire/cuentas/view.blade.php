@section('title', __('Catalogo de Opciones'))
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-4">
                            <input wire:model='filtro' type="text" class="form-control" name="search" id="search"
                            placeholder="Buscar">
                        </div>
                        <div class="col-4 text-center my-auto">
                            <h4 class="">Cuentas en ChatZeus </h4>
                        </div>
                        <div class="col-4 text-right">
                            <a class="btn btn-sm btn-light" data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-sync fa-2x text-success"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @include('livewire.cuentas.create')
                    @include('livewire.cuentas.update')
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead class="thead">
                                <tr>
                                    <td class="text-center">#</td>
                                    <th class="text-center">Descripcion</th>
                                    <th class="text-center">Licenciamiento</th>
                                    <th class="text-center">Fecha Incio</th>
                                    <th class="text-center">Fecha Vencimiento</th>
                                    <th class="text-center" class="text-center">Limite Usarios</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cuentas as $row)
                                <tr>
                                    <td class="align-middle text-right">
                                        {{ $row->cuenta_chatzeus_id }}</td>
                                    <td class="align-middle">
                                        <a data-toggle="modal" data-target="#updateModal" 
                                            class="btn btn-light mx-2"
                                            wire:click="edit({{$row->cuenta_id}})">
                                            <i class="fa fa-edit text-primary"></i>
                                        </a>    
                                        {{ $row->name }}
                                    </td>
                                    <td class="align-middle">{{ $row->descripcion }}</td>
                                    <td class="align-middle text-center">{{ $row->fecha_inicio }}</td>
                                    <td class="align-middle text-center">{{ $row->fecha_vencimiento }}</td>
                                    <td class="align-middle text-right">{{ $row->limite_usuarios }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
