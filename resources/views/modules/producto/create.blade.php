@extends('adminlte::page')

@section('title', 'Crear producto')


@section('content')
    <div class="card card-primary m-auto" style="width: 70%;">
        <div class="card-header">
            <h3 class="card-title">Nuevo producto</h3>
        </div>
        <form>
            <div class="card-body">
                <div class="form-group">
                    <label for="nombreProducto">Nombre</label>
                    <input type="text" class="form-control" id="nombreProducto"  name="nombreProducto" placeholder="Digite el nombre" required>
                </div>
                <div class="form-group">
                    <label for="tamanoProducto">Tamaño</label>
                    <input type="number" step="0.1" class="form-control" id="tamanoProducto" name="tamanoProducto" placeholder="Digite el tamaño" required>
                </div>
                <div class="form-group">
                    <label for="referenciaTamano">Referencia tamaño</label>
                        <select class="form-control" id="tamanoProducto" name="tamanoProducto" required>
                            <option value="ml">ml</option>
                            <option value="Lt" selected>Lt</option>
                            <option value="Kg">Kg</option>
                            <option value="gr">gr</option>
                            <option value="Oz">Oz</option>
                            <option value="Lb">lB</option>
                        </select>
                </div>
                <div class="form-group">
                    <label for="referencia">Referencia</label>
                    <input type="text" class="form-control" id="referencia" name="referencia" placeholder="Digite la ref" required>
                </div>
                <div class="form-group">
                    <label for="precioBase">Precio base</label>
                    <input type="number" class="form-control" id="precioBase" name="precioBase" placeholder="Digite el precio" required>
                </div>
                <div class="form-group">
                    <label for="precioUnidadTrabajador">Precio unidad trabajador</label>
                    <input type="number" class="form-control" id="precioUnidadTrabajador" name="precioUnidadTrabajador" placeholder="Digite el precio" required>
                </div>
                <div class="form-group">
                    <label for="precioUnidadVenta">Precio unidad venta</label>
                    <input type="number" class="form-control" id="precioUnidadVenta" name="precioUnidadVenta" placeholder="Digite el precio" required>
                </div>
                <div class="form-group">
                    <label for="presentacionProducto">Presentacón del producto</label>
                    <select class="form-control" name="presentacionProducto" id="presentacionProducto" required>
                        <option value="Lata">Lata</option>
                        <option value="Botella vidrio">Botella vidrio</option>
                        <option value="Botella plastico">Botella plastico</option>
                        <option value="Tetrapack">Tetrapack</option>
                        <option value="Predeterminado" selected>Predeterminado</option>
                        <option value="Icopor">Icopor</option>
                        <option value="Vaso vidrio">Vaso vidrio</option>
                        <option value="Vaso plastico">Vaso plastico</option>
                        <option value="Tasa">Tasa</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="cantidadProducto">Cantidad producto</label>
                    <input type="number" class="form-control" id="cantidadProducto" name="cantidadProducto" placeholder="Digite la cantidad" required>
                </div>
                <div class="form-group">
                    <label for="estado">Estado</label>
                    <select class="form-control" name="estado" id="estado" required>
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
                    </select>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Crear</button>
            </div>
        </form>
    </div>
@stop
