@extends('layouts.app')
@section('navbar')
    @include('livewire.general.navbar')
@endsection
    <section class="content container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card card-default card-shadow">
                    <div class="card-body">
                        <form method="POST" action="{{ route('cuentas.update', $producto->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            @include('cuentas.formulario')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection