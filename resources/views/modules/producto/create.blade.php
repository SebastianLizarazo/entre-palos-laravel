@extends('adminlte::page')

@section('title', 'Crear producto')


@section('content')
    <div class="card card-primary m-auto" style="width: 70%;">
        <div class="card-header">
            <h3 class="card-title">Nuevo producto</h3>
        </div>
        <form method="POST" action="{{ route('productos.store') }}">
            @include('modules.producto._form')
        </form>
    </div>
@stop
