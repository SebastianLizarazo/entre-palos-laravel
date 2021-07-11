@extends('adminlte::page')

@section('title', 'Categorias')


@section('content_header','Categorias')

@section('content')
    @include('partials.session_status'){{--Incluimos el partial que nos muestra los mensajes de session del usuario--}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Mostrar todas las categorias </h2>
                    <div class="card-tools">
                        <div class="input-group input-group-sm mt-1" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-tools mr-3">
                        @can('create', $newCategoria)
                            <a class="btn btn-primary" href="{{ route('categorias.create') }}">Nueva categoria</a>
                        @endcan
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $categorias as $categoria )
                            <tr>
                                <td>{{$categoria->id}}</td>
                                <td>{{$categoria->nombre}}</td>
                                <td>{{$categoria->tipo}}</td>
                                <td>
                                    <div class="text-center mb-2">
                                        <span>
                                            {{$categoria->estado}}
                                        </span>
                                            @can('update', $newCategoria)
                                                @if( $categoria->estado == 'Inactivo')
                                                    <form method="POST"
                                                          action="{{ route('categorias-setEstado', [ $categoria, $estado = 'Activo'])}}">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button class="btn btn-info">Activar</button>
                                                    </form>
                                                @else
                                                    <form method="POST"
                                                          action="{{ route('categorias-setEstado', [ $categoria, $estado = 'Inactivo']) }}">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button class="btn btn-info">Inactivar</button>
                                                    </form>
                                                @endif
                                            @endcan
                                    </div>
                                </td>
                                <div>
                                    <td>
                                        <form method="POST" action="{{ route('categorias.destroy',$categoria) }}">
                                            <a class="btn btn-success"
                                               href="{{ route('categorias.show',$categoria) }}"
                                               title="Ver"
                                            ><i class="fas fa-eye"></i></a>
                                            @can('update', $newCategoria)
                                                <a class="btn btn-info"
                                                   href="{{ route('categorias.edit',$categoria) }}"
                                                   title="Editar"
                                                ><i class="fas fa-edit"></i></a>
                                            @endcan
                                            @can('delete',$newCategoria)
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="btn btn-danger"
                                                        title="Borrar"
                                                ><i class="far fa-trash-alt"></i></button>
                                            @endcan
                                        </form>
                                    </td>
                                </div>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop




