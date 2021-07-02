@extends('adminlte::page')

@section('title', 'Crear producto')


@section('content')
    <div class="card card-primary m-auto" style="width: 70%;">
        <div class="card-header">
            <h3 class="card-title">Nuevo producto</h3>
        </div>
        <form method="POST"
              enctype="multipart/form-data"{{--Le decimos al formulario que permita subir archivos--}}
              action="{{ route('productos.store') }}">
            <hr>
            @include('modules.producto._form',['btnText' => 'Crear'])
        </form>
    </div>
@stop