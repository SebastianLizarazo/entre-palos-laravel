@extends('adminlte::page')

@section('title','Producto | '.$categoria->nombre)


@section('content')
    <div class="content-wrapper offset-2 col-md-10">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-10">
                        @include('partials.session_status'){{--Muestra el mensaje de estatus, ej: la categoria creada con exito--}}
                        <h1>Informacion de la categoria</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="content align-items-center w-75">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 m-auto">
                        <div class="card card-green m-auto">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-utensils"></i> &nbsp;
                                    {{$categoria->nombre}}</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i
                                            class="fas fa-expand"></i></button>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-10">
                                        <p>
                                            <hr>
                                                <strong><i class="fas fa-signature"></i>&nbsp;Nombre</strong>
                                                <p class="text-muted">{{ $categoria->nombre }}</p>
                                            <hr>
                                                <strong><i class="fas fa-sort-numeric-up-alt"></i>&nbsp;Tipo</strong>
                                                <p class="text-muted">{{ $categoria->tipo }}</p>
                                            <hr>
                                                <strong><i class="far fa-file-alt mr-1"></i>Estado</strong>
                                                <p class="text-muted">{{ $categoria->estado}}</p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-auto mr-auto">
                                        <a role="button" href="{{ route('categorias.index') }}" class="btn btn-success float-right"
                                           style="margin-right: 5px;">
                                            <i class="fas fa-undo-alt"></i> Regresar al inicio
                                        </a>
                                    </div>
                                    <div class="col-auto">
                                        <form method="POST" action="{{ route('categorias.destroy',$categoria) }}">
                                            @can('update',$categoria)
                                                <a role="button" href="{{ route('categorias.edit',$categoria) }}"
                                                   class="btn btn-primary float-right"
                                                   style="margin-right: 5px;">
                                                    <i class="fas fa-edit"></i> Editar
                                                </a>
                                            @endcan
                                            @can('delete',$categoria)
                                                @csrf
                                                @method('DELETE')
                                                    <button type="submit"
                                                            class="btn btn-danger"
                                                    ><i class="far fa-trash-alt"></i>Borrar
                                                    </button>
                                            @endcan
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @if(empty($categoria)){{--Si el producto esta vacio mostrara el mensaje de alerta --}}
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                    &times;
                                </button>
                                <h5><i class="icon fas fa-ban"></i> Error!</h5>
                                No se encontro ningun registro con estos parametros de
                                busqueda
                                <a role="button" href="{{ route('productos.index') }}" class="btn btn-link float-left"
                                   style="margin-right: 5px;">
                                    <i class="fas fa-undo-alt"></i> Regresar
                                </a>
                            </div>
                        @endif
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@stop
