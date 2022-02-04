@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card card-shadow">
                <div class="card-header text-center my-auto" style="background-color: #592c82;">
                    <img src="{{ asset('img/chatzeus-blanco.png') }}" height="45" class="d-inline-block align-top" alt="">
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-12">
                                <p class="w-100 text-center size20 mb-0">Sistema de Licenciamiento</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="has-icon col-md-12">
                                <span class="material-icons form-control-feedback">email</span>
                                <input id="email" name="email" type="email" class="form-control"
                                    placeholder="Correo electrónico" value="{{ old('email') }}" 
                                    autocomplete="off" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="has-icon col-md-12">
                                <span class="material-icons form-control-feedback">key</span>
                                <input id="password" name="password" type="password"
                                    class="form-control"
                                    placeholder="Contraseña" autocomplete="off">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-outline-zeus btn-block">
                                    Iniciar sesi&oacute;n
                                </button>
                            </div>
                        </div>

                        <div class="form-group row mt-3 mb-0">
                            <div class="col-md-6">
                                <p class="w-100 text-left my-auto">© 2022 - CRMZeus</p>
                            </div>
                            <div class="col-md-6 mb-0">
                                <p class="w-100 text-right my-auto">Versi&oacute;n: 1.00</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
