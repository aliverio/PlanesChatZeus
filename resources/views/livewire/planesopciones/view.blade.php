@section('title', __('Catalogo de Opciones'))
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <h4>Configuraciones por Plan</h4>
                        </div>
                        <div>
                        <select wire:model="selPlanLicenciamientoId" class="form-control">
                            @foreach($planes as $r)
                             <option value="{{ $r->plan_licenciamiento_id }}">{{ $r->descripcion}}</option>
                            @endforeach
                        </select>  
                        <!-- <input wire:model='filtro' type="text" class="form-control" name="search" id="search"
                                placeholder="Buscar">
                        </div> -->
                    </div>
                </div>

                <div class="card-body">
                    @include('livewire.planesopciones.create')
                    @include('livewire.planesopciones.update')
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead class="thead">
                                <tr>
                                    <th class="text-center">Configuraciones de ChatZeus</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($planesopciones as $row)
                                <tr>
                                    <td class="align-middle">
                                        <a type="button" class="btn btn-light mr-2" wire:click="setActivar({{ $row->plan_opcion_id }})">
                                            @if ($row->activo)
                                                <i class="far fa-check-circle text-success"></i>
                                            @else
                                                <i class="far fa-check-circle text-danger"></i>
                                            @endif
                                        </a>
                                        {{ $row->descripcion }}
                                    </td>
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
