@extends('adminlte::page')

@section('title','Producto | '.$producto->nombre)


@section('content')
    <div class="content-wrapper offset-2 col-md-10">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-10">
                        <h1>Informacion del producto</h1>
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
                                    {{$producto->nombre}}</h3>
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
                                            @if( $producto->imagen_producto )
                                                <div class="col-5 text-center">
                                                    <img src="/storage/{{ $producto->imagen_producto }}" alt="{{ $producto->nombre }}" class="img-circle img-fluid">
                                                    <div class="text-center">
                                                        <strong><i class="fas fa-signature"></i>&nbsp;Nombre</strong>
                                                        <p class="text-muted">{{ $producto->nombre }}</p>
                                                    </div>
                                                </div>
                                            @else
                                            <hr>
                                                <strong><i class="fas fa-signature"></i>&nbsp;Nombre</strong>
                                                <p class="text-muted">{{ $producto->nombre }}</p>
                                            @endif
                                            <hr>
                                            <strong><i class="fas fa-sort-numeric-up-alt"></i>&nbsp;Tamaño</strong>
                                            <p class="text-muted">{{ $producto->tamano }}</p>
                                            <hr>
                                            <strong><i class="far fa-file-alt mr-1"></i>&nbsp;Referencia tamaño</strong>
                                            <p class="text-muted">{{ $producto->referencia_tamano }}</p>
                                            <hr>
                                            <strong><i class="far fa-file-alt mr-1"></i>&nbsp;Referencia</strong>
                                            <p class="text-muted">{{ $producto->referencia }}</p>
                                            <hr>
                                            <strong><i class="fas fa-dollar-sign"></i>&nbsp;Precio base</strong>
                                            <p class="text-muted">{{ $producto->precio_base }}</p>
                                            <hr>
                                            <strong><i class="fas fa-dollar-sign"></i>&nbsp;Precio unidad trabajador</strong>
                                            <p class="text-muted">{{ $producto->precio_unidad_trabajador }}</p>
                                            <hr>
                                            <strong><i class="fas fa-dollar-sign"></i>&nbsp;Precio unidad venta</strong>
                                            <p class="text-muted">{{ $producto->precio_unidad_venta }}</p>
                                            <hr>
                                            <strong><i class="far fa-file-alt mr-1"></i>&nbsp;Presentación del producto</strong>
                                            <p class="text-muted">{{ $producto->presentacion_producto }}</p>
                                            <hr>
                                            <strong><i class="fas fa-sort-amount-up-alt"></i>&nbsp;Cantidad producto</strong>
                                            <p class="text-muted">{{ $producto->cantidad_producto }}</p>
                                            <hr>
                                            <strong><i class="far fa-file-alt mr-1"></i>&nbsp;Estado</strong>
                                            <p class="text-muted">{{ $producto->estado }}</p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-auto mr-auto">
                                        <a role="button" href="{{ route('productos.index') }}" class="btn btn-success float-right"
                                           style="margin-right: 5px;">
                                            <i class="fas fa-undo-alt"></i> Regresar
                                        </a>
                                    </div>
                                    <div class="col-auto">
                                        <a role="button" href="{{ route('productos.edit',$producto) }}"
                                           class="btn btn-primary float-right"
                                           style="margin-right: 5px;">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @if(empty($producto)){{--Si el producto esta vacio mostrara el mensaje de alerta --}}
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
