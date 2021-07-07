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
                value="{{ old('nombre', $categoria->nombre) }}"
            >
        @include('partials.validation_errors',['name' => 'nombre']){{--Incluimos el partial que se encarga de mostrar los errores de cada casilla y
        le manadamos el nombre de la casilla que queremos evaluar--}}
    </div>
    <div class="form-group">
        <label for="tipo">Tipo</label>
        <select
            name="tipo"
            id="tipo"
            class="form-control"
        >
            <option value="">Seleccione</option>
            <option value="Comida"
                {{ old('tipo', $categoria->tipo) == 'Comida' ? 'selected' : '' }}
            >Comida</option>
            <option value="Bebida"
                {{ old('tipo', $categoria->tipo) == 'Bebida' ? 'selected' : '' }}
            >Bebida</option>
            <option value="Postre"
                {{ old('tipo', $categoria->tipo) == 'Postre' ? 'selected' : '' }}
            >Postre</option>
        </select>
        @include('partials.validation_errors',['name' => 'tipo'])
    </div>
    <div class="form-group">
        <label for="estado">estado</label>
        <select
            class="form-control"
            id="estado"
            name="estado"
        >
            <option value="">Seleccione</option>
            <option value="Activo"
                    {{ old('estado', $categoria->estado) == 'Activo'? 'selected':''}}
            >Activo</option>
            <option value="Inactivo"
                    {{ old('estado', $categoria->estado) == 'Inactivo'? 'selected':''}}
            >Inactivo</option>
        </select>
        @include('partials.validation_errors',['name' => 'estado'])
    </div>
</div>
<div class="card-footer">
    <button type="submit" class="btn btn-primary">{{ $btnText }}</button>
    <a class="btn btn-link float-right" href="{{ route('categorias.index') }}">Cancelar</a>
</div>
