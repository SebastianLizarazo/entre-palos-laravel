@csrf
<div class="card-body">
    <div class="form-group">
        <label for="imagen_producto">Imagen del producto (opcional)</label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="imagen_producto" name="imagen_producto">
                <label class="custom-file-label" for="imagen_producto">Suba una imagen</label>
            </div>
            <div class="input-group-append">
                <span class="input-group-text">Upload</span>
            </div>
        </div>
        @include('partials.validation_errors',['name' => 'imagen_producto'])
    </div>
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
        @include('partials.validation_errors',['name' => 'nombre']){{--Incluimos el partial que se encarga de mostrar los errores de cada casilla y
        le manadamos el nombre de la casilla que queremos evaluar--}}
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
        @include('partials.validation_errors',['name' => 'tamano'])
    </div>
    <div class="form-group">
        <label for="referencia_tamano">Referencia tamaño</label>
        <select
            class="form-control"
            id="referencia_tamano"
            name="referencia_tamano"
        >
            <option value="">Seleccione</option>
            <option value="ml"
                    {{ old('referencia_tamano', $producto->referencia_tamano)== 'ml'? 'selected':''}}
            >ml</option>
            <option value="Lt"
                    {{ old('referencia_tamano', $producto->referencia_tamano)== 'Lt'? 'selected':''}}
            >Lt</option>
            <option value="Kg"
                    {{ old('referencia_tamano', $producto->referencia_tamano)== 'Kg'? 'selected':''}}
            >Kg</option>
            <option value="gr"
                    {{ old('referencia_tamano', $producto->referencia_tamano)== 'gr'? 'selected':''}}
            >gr</option>
            <option value="Oz"
                    {{ old('referencia_tamano', $producto->referencia_tamano)== 'Oz'? 'selected':''}}
            >Oz</option>
            <option value="Lb"
                    {{ old('referencia_tamano', $producto->referencia_tamano)== 'Lb'? 'selected':''}}
            >Lb</option>
        </select>
        @include('partials.validation_errors',['name' => 'referencia_tamano'])
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
        @include('partials.validation_errors',['name' => 'referencia'])
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
        @include('partials.validation_errors',['name' => 'precio_base'])
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
        @include('partials.validation_errors',['name' => 'precio_unidad_trabajador'])
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
        @include('partials.validation_errors',['name' => 'precio_unidad_venta'])
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
                {{ old('presentacion_producto', $producto->presentacion_producto) == 'Lata'? 'selected':'' }}
            >Lata</option>
            <option value="Botella vidrio"
                {{ old('presentacion_producto', $producto->presentacion_producto) == 'Botella vidrio'? 'selected':'' }}
            >Botella vidrio</option>
            <option value="Botella plastico"
                {{ old('presentacion_producto', $producto->presentacion_producto) == 'Botella plastico'? 'selected':'' }}
            >Botella plastico</option>
            <option value="Tetrapack"
                {{ old('presentacion_producto', $producto->presentacion_producto) == 'Tetrapack'? 'selected':'' }}
            >Tetrapack</option>
            <option value="Predeterminado"
                {{ old('presentacion_producto', $producto->presentacion_producto) == 'Predeterminado'? 'selected':'' }}
            >Predeterminado</option>
            <option value="Icopor"
                {{ old('presentacion_producto', $producto->presentacion_producto) == 'Icopor'? 'selected':'' }}
            >Icopor</option>
            <option value="Vaso vidrio"
                {{ old('presentacion_producto', $producto->presentacion_producto) == 'Vaso vidrio'? 'selected':'' }}
            >Vaso vidrio</option>
            <option value="Vaso plastico"
                {{ old('presentacion_producto', $producto->presentacion_producto) == 'Vaso plastico'? 'selected':'' }}
            >Vaso plastico</option>
            <option value="Tasa"
                {{ old('presentacion_producto') == 'Tasa'? 'selected':'' }}
            >Tasa</option>
        </select>
        @include('partials.validation_errors',['name' => 'presentacion_producto'])
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
        @include('partials.validation_errors',['name' => 'cantidad_producto'])
    </div>
    <div class="form-group">
        <label for="categoria_id">Categoria</label>
        <select
            name="categoria_id"
            id="categoria_id"
            class="form-control"
        >
            <option value="">Seleccione</option>
            @foreach($categorias as $id => $name)
                <option value="{{ $id }}"
                        {{ $id === $producto->categoria_id? 'selected' : '' }}
                >{{ $name }}</option>
            @endforeach
        </select>
        @include('partials.validation_errors',['name' => 'categoria_id'])
    </div>
    <div class="form-group">
        <label for="estado">Estado</label>
        <select
            class="form-control"
            name="estado"
            id="estado"
        >
            <option value="">Seleccione</option>
            <option value="Activo"
                {{ old('estado',$producto->estado) == 'Activo'? 'selected': '' }}
            >Activo</option>
            <option value="Inactivo"
                {{ old('estado',$producto->estado) == 'Inactivo'? 'selected': '' }}
            >Inactivo</option>
        </select>
        @include('partials.validation_errors',['name' => 'estado'])
    </div>
</div>
<div class="card-footer">
    <button type="submit" class="btn btn-primary">{{ $btnText }}</button>
    <a class="btn btn-link float-right" href="{{ route('productos.index') }}">Cancelar</a>
</div>
