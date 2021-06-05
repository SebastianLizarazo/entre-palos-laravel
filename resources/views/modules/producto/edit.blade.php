@extends('adminlte::page')

@section('title', 'Editar producto')

@section('content')
    @if($producto->imagen_producto)
        <div class="col-5 text-center">
            <img src="/storage/{{ $producto->imagen_producto }}" alt="{{ $producto->nombre }}" class="img-circle img-fluid">
            <div class="text-center">
                <strong><i class="fas fa-signature"></i>&nbsp;Nombre</strong>
                <p class="text-muted">{{ $producto->nombre }}</p>
            </div>
        </div>
    @endif
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

