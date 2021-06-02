@extends('adminlte::page')

@section('title', 'Productos')


@section('content_header','Productos')


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Todos los productos</h2>
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
                        <a class="btn btn-primary" href="{{ route('productos.create') }}">Nuevo producto</a>
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
                                <td>{{$producto->id}}</td>
                                <td>{{$producto->nombre}}</td>
                                <td>{{$producto->tamano}}</td>
                                <td>{{$producto->referencia_tamano}}</td>
                                <td>{{$producto->referencia}}</td>
                                <td>{{$producto->precio_base}}</td>
                                <td>{{$producto->precio_unidad_trabajador}}</td>
                                <td>{{$producto->precio_unidad_venta}}</td>
                                <td>{{$producto->presentacion_producto}}</td>
                                <td>{{$producto->cantidad_producto}}</td>
                                <div>
                                    <td>
                                        <span>{{ $producto->estado }}</span>
                                        @if( $producto->estado == 'Activo')
                                            <a class="btn btn-primary green" href="#">Activar</a>
                                        @else
                                            <a class="btn btn-primary red" href="#">Inactivar</a>
                                        @endif
                                    </td>
                                </div>
                                <div>
                                    <td>
                                        <form method="POST" action="{{ route('productos.destroy',$producto) }}">
                                            <a class="btn btn-info blue" href="{{ route('productos.show',$producto) }}">Ver</a>
                                            <a class="btn btn-info green" href="{{ route('productos.edit',$producto) }}">Editar</a>
                                                @csrf
                                                @method('DELETE')
                                              <button type="submit" class="btn btn-danger">Borrar</button>
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




