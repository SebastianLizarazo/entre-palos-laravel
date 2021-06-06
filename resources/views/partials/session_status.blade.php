@if( session('status') ){{--Pregunta si en la session hay algun mensaje de tipo estatus--}}
    <div class="alert alert-success fade show w-75">
        {{ session('status') }}{{--Si lo hay lo muestra(es el mensaje que esta en el destroy del ProductoController)--}}
        <button type="button"
                class="close"
                data-dismiss="alert"
                aria-label="close">
                <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
