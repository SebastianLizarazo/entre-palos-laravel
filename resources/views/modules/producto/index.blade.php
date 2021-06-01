@extends('adminlte::page')

@section('title', 'Productos')


@section('content_header','Productos')


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Todos los productos</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Tamaño</th>
                            <th>Referencia tamaño</th>
                            <th>Referencia</th>
                            <th>Precio base</th>
                            <th>Precio unidad trabajador</th>
                            <th>Precio unidad venta</th>
                            <th>Presentación producto</th>
                            <th>Cantidad</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $productos as $producto )
                            <tr>
                                <td>{{$producto->Id}}</td>
                                <td>{{$producto->Nombre}}</td>
                                <td>{{$producto->Tamano}}</td>
                                <td>{{$producto->ReferenciaTamano}}</td>
                                <td>{{$producto->Referencia}}</td>
                                <td>{{$producto->PrecioBase}}</td>
                                <td>{{$producto->PrecioUnidadTrabajador}}</td>
                                <td>{{$producto->PrecioUnidadVenta}}</td>
                                <td>{{$producto->PresentacionProdcuto}}</td>
                                <div>
                                    <td>
                                        <span>{{ $producto->Estado }}</span>
                                        @if( $producto->Estado == 'Activo')
                                            <a class="btn btn-primary green" href="#">Activar</a>
                                        @else
                                            <a class="btn btn-primary red" href="#">Inactivar</a>
                                        @endif
                                    </td>
                                </div>
                                <div>
                                    <td>
                                        <a class="btn btn-info blue" href="{{ route('productos.show') }}">Ver</a>
                                        <a class="btn btn-info green" href="{{ route('productos.edit') }}">Editar</a>
                                        <button class="btn btn-danger">Borrar</button>
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




