@section('title', __('Catalogo de Opciones'))
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <h4>Catalogo de Opciones </h4>
                        </div>
                        <div>
                            <input wire:model='filtro' type="text" class="form-control" name="search" id="search"
                                placeholder="Buscar">
                        </div>
                        <div class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-plus fa-2x"></i>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @include('livewire.planes.create')
                    @include('livewire.planes.update')
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead class="thead">
                                <tr>
                                    <td>#</td>
                                    <th>Descripcion</th>
                                    <th>Limite Usuarios</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($planes as $row)
                                <tr>
                                    <td>{{ $row->plan_licenciamiento_id }}</td>
                                    <td>
                                        {{ $row->descripcion }}
                                    </td>
                                    <td>{{ $row->limite_usuario }}</td>
                                    <td width="90">
                                        <div class="btn-group">
                                            <a data-toggle="modal" data-target="#updateModal" class="btn btn-primary"
                                                wire:click="edit({{$row->plan_licenciamiento_id}})"><i class="fa fa-edit"></i>
                                            </a>
                                            <a class="btn btn-primary"
                                                onclick="confirm('Confirm Delete Tabla id {{$row->plan_licenciamiento_id}}? \nDeleted Tablas cannot be recovered!')||event.stopImmediatePropagation()"
                                                wire:click="destroy({{$row->plan_licenciamiento_id}})"><i class="fa fa-trash"></i>
                                            </a>
                                        </div>
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
