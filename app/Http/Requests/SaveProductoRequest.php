<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'nombre' => [
                'required',
                Rule::unique('productos')->ignore($this->route('producto'))// Hace que al momento de crear un poducto no lo deje crear con un nombre existente pero
                                                                                        // cuando este en la vista edit y no se cambie el nombre no aparesca el error de que este producto ya existe
            ],
            'tamano'=> 'required',
            'referencia_tamano' => 'required',
            'referencia' => 'required',
            'precio_base' => 'required|max:99999999',
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
            'precio_base' => 'El precio base debe tener menos de 7 digitos'
        ];
    }
}
