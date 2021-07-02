@extends('adminlte::page')

@section('title', 'Editar categoria')

@section('content')
    <div class="card card-primary m-auto" style="width: 70%;">
        <div class="card-header">
            <h3 class="card-title">{{$categoria->nombre}}</h3>
        </div>
        <form method="POST"
              enctype="multipart/form-data"{{--Le decimos al formulario que permita subir archivos--}}
              action="{{route('categorias.update',$categoria)}}">
         @method('PUT')
            @include('modules.categoria._form',['btnText' => 'Actualizar'])
        </form>
    </div>
@stop

