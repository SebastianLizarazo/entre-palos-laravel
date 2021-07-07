@extends('adminlte::page')

@section('title', 'Productos')


@section('content_header','Productos')

@section('content')
    @include('partials.session_status'){{--Incluimos el partial que nos muestra los mensajes de session del usuario--}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Mostrar  todos productos</h2>
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
                            <th>Categoria</th>
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
                                <td>
                                    @if(!empty($producto->categoria))
                                        <a href="{{ route('categorias.show',$producto->categoria) }}"
                                           class="badge badge-secondary">
                                            {{$producto->categoria->nombre}}
                                        </a>
                                    @else
                                        <span>No hay categoria</span>
                                    @endif
                                </td>
                                <td>{{$producto->cantidad_producto}}</td>
                                <div>
                                    <td>
                                        <div class="text-center mb-2">
                                            <span>
                                                {{ $producto->estado }}
                                            </span>
                                        </div>
                                            @if( $producto->estado == 'Inactivo')
                                            <form method="POST"
                                                  action="{{ route('productos-setEstado', [ $producto, $estado = 'Activo'])}}">
                                                  @csrf
                                                  @method('PATCH')
                                                  <button class="btn btn-info">Activar</button>
                                            </form>
                                            @else
                                                <form method="POST"
                                                      action="{{ route('productos-setEstado', [ $producto, $estado = 'Inactivo']) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button class="btn btn-info">Inactivar</button>
                                                </form>
                                            @endif
                                    </td>
                                </div>
                                <div>
                                    <td>
                                        <form method="POST" action="{{ route('productos.destroy',$producto) }}">
                                            <a class="btn btn-success"
                                               href="{{ route('productos.show',$producto) }}"
                                               title="Ver"
                                            ><i class="fas fa-eye"></i></a>
                                            <a class="btn btn-info"
                                               href="{{ route('productos.edit',$producto) }}"
                                               title="Editar"
                                            ><i class="fas fa-edit"></i></a>
                                                @csrf
                                                @method('DELETE')
                                              <button type="submit"
                                                      class="btn btn-danger"
                                                      title="Borrar"
                                              ><i class="far fa-trash-alt"></i></button>
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




