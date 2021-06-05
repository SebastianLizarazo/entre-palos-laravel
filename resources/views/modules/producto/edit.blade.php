@extends('adminlte::page')

@section('title', 'Editar producto')

@section('content')
    <div class="card card-primary m-auto" style="width: 70%;">
        <div class="card-header">
            <h3 class="card-title">{{$producto->nombre}}</h3>
        </div>
        <form method="POST"
              enctype="multipart/form-data"{{--Le decimos al formulario que permita subir archivos--}}
              action="{{route('productos.update',$producto)}}">
         @method('PUT')
            @include('modules.producto._form',['btnText' => 'Actualizar'])
        </form>
    </div>
@stop

