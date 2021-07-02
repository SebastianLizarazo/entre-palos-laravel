@extends('adminlte::page')

@section('title', 'Crear categoria')


@section('content')
    <div class="card card-primary m-auto" style="width: 70%;">
        <div class="card-header">
            <h3 class="card-title">Nueva categoria</h3>
        </div>
        <form method="POST"
              enctype="multipart/form-data"{{--Le decimos al formulario que permita subir archivos--}}
              action="{{ route('categorias.store') }}">
            <hr>
            @include('modules.categoria._form',['btnText' => 'Crear'])
        </form>
    </div>
@stop
