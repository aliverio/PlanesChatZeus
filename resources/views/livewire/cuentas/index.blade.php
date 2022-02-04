@extends('layouts.app')
@section('navbar')
    @include('livewire.general.navbar')
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            {{-- Controlador Livewire --}}
            @livewire('cuentas.cuentas') 
        </div>     
    </div>   
</div>
@endsection