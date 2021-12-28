@section('title', __('Catalogo de Opciones'))
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div>
                            <input wire:model='filtro' type="text" class="form-control" name="search" id="search"
                                placeholder="Buscar">
                        </div>    
                        <div class="float-center">
                            <h4>Configuraciones de ChatZeus</h4>
                        </div>
                        
                        <div class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-plus fa-2x"></i>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @include('livewire.opciones.create')
                    @include('livewire.opciones.update')
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead class="thead">
                                <tr>
                                    <td class="text-center">#</td>
                                    <th class="text-center">Descripción</th>
                                    <td class="text-center">Clave</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($opciones as $row)
                                <tr>
                                    <td class="align-middle text-right mr-2">
                                        {{ $row->catalogo_opcion_id }}
                                    </td>
                                    <td class="align-middle">
                                        <a data-toggle="modal" data-target="#updateModal" class="btn btn-light mx-2"
                                            wire:click="edit({{$row->catalogo_opcion_id}})">
                                            <i class="fa fa-edit text-primary"></i>
                                        </a>
                                        {{ $row->descripcion }}
                                        <a class="btn btn-light float-right"
                                            onclick="confirm('Confirm Delete Tabla id {{$row->catalogo_opcion_id}}? \nDeleted Tablas cannot be recovered!')||event.stopImmediatePropagation()"
                                            wire:click="destroy({{$row->catalogo_opcion_id}})">
                                            <i class="fa fa-trash text-danger"></i>
                                        </a>
                                    </td>
                                    <td class="align-middle text-center">
                                        {{ $row->clave }}
                                    </td>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
