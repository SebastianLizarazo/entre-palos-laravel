{{--Este partial se encarga de mostrar los errores de validacion de las casillas del formulario--}}
@error( $name ){{--Resibe el nombre del input a evaluar y pregunta si tiene algun error de validacion--}}
    <div class="alert alert-danger">
        <small class="m-0">{{ $message }}</small>
    </div>
@enderror
