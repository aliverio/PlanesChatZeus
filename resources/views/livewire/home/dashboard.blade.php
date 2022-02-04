@extends('layouts.app')
@section('title', __('Dashboard'))
@section('navbar')
    @include('general.navbar')
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="row">
                    <div class="col-6">
                        <div class="list-group mb-2">
                            <a href="{{ route('ordenes.index') }}" class="list-group-item list-group-item-action py-1">
                                <div class="d-flex">
                                    <div class="w-25">
                                        <span class="material-icons size50">assignment</span>
                                    </div>
                                    <div class="my-auto">
                                        <h5 class="ml-3 my-auto">Ordenes</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="list-group mb-2">
                            <a href="#" class="list-group-item list-group-item-action py-1">
                                <div class="d-flex">
                                    <div class="w-25">
                                        <span class="material-icons size50">calculate</span>
                                    </div>
                                    <div class="my-auto">
                                        <h5 class="ml-3 my-auto">Presupuestos</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="list-group mb-2">
                            <a href="#" class="list-group-item list-group-item-action py-1">
                                <div class="d-flex">
                                    <div class="w-25">
                                        <span class="material-icons size50">point_of_sale</span>
                                    </div>
                                    <div class="my-auto">
                                        <h5 class="ml-3 my-auto">Ventas</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="list-group mb-2">
                            <a href="{{ route('clientes.index') }}" class="list-group-item list-group-item-action py-1">
                                <div class="d-flex">
                                    <div class="w-25">
                                        <span class="material-icons size50">people</span>
                                    </div>
                                    <div class="my-auto d-block">
                                        <h5 class="ml-3 my-auto">Clientes</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="list-group mb-2">
                            <a href="{{ route('productos.index') }}" class="list-group-item list-group-item-action py-1">
                                <div class="d-flex">
                                    <div class="w-25">
                                        <span class="material-icons size50">sell</span>
                                    </div>
                                    <div class="my-auto">
                                        <h5 class="ml-3 my-auto">Productos y Servicios</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="list-group mb-2">
                            <a href="#" class="list-group-item list-group-item-action py-1">
                                <div class="d-flex">
                                    <div class="w-25">
                                        <span class="material-icons size50">date_range</span>
                                    </div>
                                    <div class="my-auto">
                                        <h5 class="ml-3 my-auto">Agenda</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="list-group mb-2">
                            <a href="#" class="list-group-item list-group-item-action py-1">
                                <div class="d-flex">
                                    <div class="w-25">
                                        <span class="material-icons size50">trending_up</span>
                                    </div>
                                    <div class="my-auto">
                                        <h5 class="ml-3 my-auto">AdministraciÃ³n</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="list-group mb-2">
                            <a href="#" class="list-group-item list-group-item-action py-1">
                                <div class="d-flex">
                                    <div class="w-25">
                                        <span class="material-icons size50">request_quote</span>
                                    </div>
                                    <div class="my-auto">
                                        <h5 class="ml-3 my-auto">FacturaciÃ³n</h5>
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
