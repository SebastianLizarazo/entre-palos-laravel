@csrf
<div class="card-body">
    <div class="form-group">
        <label for="nombre">Nombre</label>
            <input
                type="text"
                class="form-control"
                id="nombre"
                name="nombre"
                placeholder="Digite el nombre"
                value="{{ old('nombre', $producto->nombre) }}"
            >
        @error('nombre'){{--Si hay un error en el input de nombre--}}
            <br>
            <small>{{$message}}</small>{{--Me imprime el mensage que a causado ese error de validacion--}}
            <br>
        @enderror
    </div>
    <div class="form-group">
        <label for="tamano">Tamaño</label>
        <input
            type="number"
            step="0.1"
            class="form-control"
            id="tamano"
            name="tamano"
            placeholder="Digite el tamaño"
            value="{{ old('tamano', $producto->tamano) }}"
        >
        @error('tamano'){{--Si hay un error en el input de nombre--}}
        <br>
        <small>{{$message}}</small>{{--Me imprime el mensage que a causado ese error de validacion--}}
        <br>
        @enderror
    </div>
    <div class="form-group">
        <label for="referencia_tamano">Referencia tamaño</label>
        <select
            class="form-control"
            id="referencia_tamano"
            name="referencia_tamano"
        >
            <option value="">Seleccione</option>
            <option @if ( view('modules.producto.edit')) value="ml" {{ old('referencia_tamano')== 'ml'? 'selected':''}}
                    @else value="ml" @endif>ml</option>
            <option @if ( view('modules.producto.edit')) value="Lt" {{ old('referencia_tamano')== 'Lt'? 'selected':''}}
                    @else value="Lt" @endif>Lt</option>
            <option @if ( view('modules.producto.edit')) value="Kg" {{ old('referencia_tamano')== 'Kg'? 'selected':''}}
                    @else value="Kg" @endif>Kg</option>
            <option @if ( view('modules.producto.edit')) value="gr" {{ old('referencia_tamano')== 'gr'? 'selected':''}}
                    @else value="gr" @endif>gr</option>
            <option @if ( view('modules.producto.edit')) value="Oz" {{ old('referencia_tamano')== 'Oz'? 'selected':''}}
                    @else value="Oz" @endif>Oz</option>
            <option @if ( view('modules.producto.edit')) value="Lb" {{ old('referencia_tamano')== 'Lb'? 'selected':''}}
                    @else value="Lb" @endif>Lb</option>
        </select>
        @error('referencia_tamano'){{--Si hay un error en el input de nombre--}}
        <br>
        <small>{{$message}}</small>{{--Me imprime el mensage que a causado ese error de validacion--}}
        <br>
        @enderror
    </div>
    <div class="form-group">
        <label for="referencia">Referencia</label>
        <input
            type="text"
            class="form-control"
            id="referencia"
            name="referencia"
            placeholder="Digite la ref"
            value="{{ old('referencia', $producto->referencia) }}"
        >
        @error('referencia'){{--Si hay un error en el input de nombre--}}
        <br>
        <small>{{$message}}</small>{{--Me imprime el mensage que a causado ese error de validacion--}}
        <br>
        @enderror
    </div>
    <div class="form-group">
        <label for="precio_base">Precio base</label>
        <input
            type="number"
            class="form-control"
            id="precio_base"
            name="precio_base"
            placeholder="Digite el precio"
            value="{{ old('precio_base', $producto->precio_base) }}"
        >
        @error('precio_base'){{--Si hay un error en el input de nombre--}}
        <br>
        <small>{{$message}}</small>{{--Me imprime el mensage que a causado ese error de validacion--}}
        <br>
        @enderror
    </div>
    <div class="form-group">
        <label for="precio_unidad_trabajador">Precio unidad trabajador</label>
        <input
            type="number"
            class="form-control"
            id="precio_unidad_trabajador"
            name="precio_unidad_trabajador"
            placeholder="Digite el precio"
            value="{{ old('precio_unidad_trabajador', $producto->precio_unidad_trabajador) }}"
        >
        @error('precio_unidad_trabajador'){{--Si hay un error en el input de nombre--}}
        <br>
        <small>{{$message}}</small>{{--Me imprime el mensage que a causado ese error de validacion--}}
        <br>
        @enderror
    </div>
    <div class="form-group">
        <label for="precio_unidad_venta">Precio unidad venta</label>
        <input type="number"
               class="form-control"
               id="precio_unidad_venta"
               name="precio_unidad_venta"
               placeholder="Digite el precio"
               value="{{ old('precio_unidad_venta', $producto->precio_unidad_venta) }}"
        >
        @error('precio_unidad_venta'){{--Si hay un error en el input de nombre--}}
        <br>
        <small>{{$message}}</small>{{--Me imprime el mensage que a causado ese error de validacion--}}
        <br>
        @enderror
    </div>
    <div class="form-group">
        <label for="presentacion_producto">Presentación del producto</label>
        <select
            class="form-control"
            name="presentacion_producto"
            id="presentacion_producto"
        >
            <option value="">Seleccione</option>
            <option value="Lata"
                {{ old('presentacion_producto') == 'Lata'? 'selected':'' }}
            >Lata</option>
            <option value="Botella vidrio"
                {{ old('presentacion_producto') == 'Botella vidrio'? 'selected':'' }}
            >Botella vidrio</option>
            <option value="Botella plastico"
                {{ old('presentacion_producto') == 'Botella plastico'? 'selected':'' }}
            >Botella plastico</option>
            <option value="Tetrapack"
                {{ old('presentacion_producto') == 'Tetrapack'? 'selected':'' }}
            >Tetrapack</option>
            <option value="Predeterminado"
                {{ old('presentacion_producto') == 'Predeterminado'? 'selected':'' }}
            >Predeterminado</option>
            <option value="Icopor"
                {{ old('presentacion_producto') == 'Icopor'? 'selected':'' }}
            >Icopor</option>
            <option value="Vaso vidrio"
                {{ old('presentacion_producto') == 'Vaso vidrio'? 'selected':'' }}
            >Vaso vidrio</option>
            <option value="Vaso plastico"
                {{ old('presentacion_producto') == 'Vaso plastico'? 'selected':'' }}
            >Vaso plastico</option>
            <option value="Tasa"
                {{ old('presentacion_producto') == 'Tasa'? 'selected':'' }}
            >Tasa</option>
        </select>
        @error('presentacion_producto'){{--Si hay un error en el input de nombre--}}
        <br>
        <small>{{$message}}</small>{{--Me imprime el mensage que a causado ese error de validacion--}}
        <br>
        @enderror
    </div>
    <div class="form-group">
        <label for="cantidad_producto">Cantidad producto</label>
        <input
            type="number"
            class="form-control"
            id="cantidad_producto"
            name="cantidad_producto"
            placeholder="Digite la cantidad"
            value="{{ old('cantidad_producto', $producto->cantidad_producto) }}"
        >
        @error('cantidad_producto'){{--Si hay un error en el input de nombre--}}
        <br>
        <small>{{$message}}</small>{{--Me imprime el mensage que a causado ese error de validacion--}}
        <br>
        @enderror
    </div>
    <div class="form-group">
        <label for="estado">Estado</label>
        <select
            class="form-control"
            name="estado"
            id="estado"
        >
            <option value="">Seleccione</option>
            <option value="Activo"{{ old('estado') == 'Activo'? 'selected': '' }}>Activo</option>
            <option value="Inactivo"{{ old('estado') == 'Inactivo'? 'selected': '' }}>Inactivo</option>
        </select>
        @error('estado'){{--Si hay un error en el input de nombre--}}
        <br>
        <small>{{$message}}</small>{{--Me imprime el mensage que a causado ese error de validacion--}}
        <br>
        @enderror
    </div>
</div>
<div class="card-footer">
    <button type="submit" class="btn btn-primary">{{ $btnText }}</button>
    <a class="btn btn-link float-right" href="{{ route('productos.index') }}">Cancelar</a>
</div>
