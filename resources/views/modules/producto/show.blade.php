@extends('adminlte::page')

@section('title','Producto | '.$producto->nombre)


@section('content')
<div class="col-md-3">
    <div class="card card-success shadow-sm">
        <div class="card-header">
            <h3 class="card-title">Shadow - Small</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            The body of the card
        </div>
        <!-- /.card-body -->
    </div>
@stop
