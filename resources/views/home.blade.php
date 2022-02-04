@extends('layouts.app')
@section('navbar')
    @include('livewire.general.navbar')
@endsection
@section('title', __('Dashboard'))
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="row">
                    <div class="col-6">
                        <div class="list-group mb-2">
                            <a href="/cuentas" class="list-group-item list-group-item-action py-1">
                                <div class="d-flex">
                                    <div class="w-25 mt-1 mb-0">
                                        <span class="material-icons size40">account_circle</span>
                                    </div>
                                    <div class="my-auto">
                                        <h5 class="ml-3 my-auto">Cuentas en ChatZeus</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="list-group mb-2">
                            <a href="/licencia-periodos" class="list-group-item list-group-item-action py-1">
                                <div class="d-flex">
                                    <div class="w-25 mt-1 mb-0">
                                        <span class="material-icons size40">hourglass_top</span>
                                    </div>
                                    <div class="my-auto">
                                        <h5 class="ml-3 my-auto">Periodos de Licencias</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="list-group mb-2">
                            <a href="/licencia-opciones" class="list-group-item list-group-item-action py-1">
                                <div class="d-flex">
                                    <div class="w-25 mt-1 mb-0">
                                        <span class="material-icons size40">tune</span>
                                    </div>
                                    <div class="my-auto">
                                        <h5 class="ml-3 my-auto">Opciones de Licencia</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="list-group mb-2">
                            <a href="/planes-opciones" class="list-group-item list-group-item-action py-1">
                                <div class="d-flex">
                                    <div class="w-25 mt-1 mb-0">
                                        <span class="material-icons size40">list_alt</span>
                                    </div>
                                    <div class="my-auto">
                                        <h5 class="ml-3 my-auto">Periodos de Licencias</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection