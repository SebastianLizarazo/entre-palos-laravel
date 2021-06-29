<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Producto extends Model
{
    use HasFactory;

    protected $guarded = [];//deshabilitamos la proteccion contra asignacion masiva por defecto,
                            // esto se debe hacer solo cuando en el controlador no colocamos request->all()
                            // y establecemos otra forma de evitar la asignacion masiva como en el SaveProductoRequest

    public function categoria(){//categoria esta en singular porque un producto solo puede tener una categoria
        //belongsTo significa pertenece a
          return $this->belongsTo(Categoria::class);
    }

}
