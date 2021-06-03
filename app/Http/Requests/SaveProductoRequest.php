<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveProductoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => ['required','unique:productos,nombre'],
            'tamano'=> 'required',
            'referencia_tamano' => 'required',
            'referencia' => 'required',
            'precio_base' => 'required',
            'precio_unidad_trabajador' => 'required',
            'precio_unidad_venta' => 'required',
            'presentacion_producto' => 'required',
            'cantidad_producto' => 'required',
            'estado' => 'required',
        ];
    }

    public function messages()
    {
        return [
           'nombre.required' => 'El producto necesita un nombre',
            'precio_base.required' => 'El producto debe tener un precio base',
            'nombre.unique' => 'Este producto ya existe',
        ];
    }
}
