<?php

namespace App\Http\Requests;

use Illuminate\Auth\Access\Gate;
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
        //allows significa permite y definimos el gate al que hace referencia
        return  true;
        //return Gate::authorize('create', new \App\Models\Producto);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'imagen_producto' => 'mimes:jpeg,png,jpg|nullable',//mimes es el tipo de formato permitido
            'nombre' => [
                'required',
                Rule::unique('productos')->ignore($this->route('producto'))// Hace que al momento de crear un poducto no lo deje crear con un nombre existente pero
                                                                                        // cuando este en la vista edit y no se cambie el nombre no aparesca el error de que este producto ya existe
            ],
            'tamano'=> 'required',//mejorar para que no se pueda digitar un numero de mas de 5 digitos
            'referencia_tamano' => 'required',
            'referencia' => [
                'required',
                Rule::unique('productos')->ignore($this->route('producto'))
            ],
            'precio_base' => 'required',//mejorar para que el usuario no pueda digitar un precio de mas de 7 digitos
            'precio_unidad_trabajador' => 'required',//mejorar para que el usuario no pueda digitar un precio de mas de 7 digitos
            'precio_unidad_venta' => 'required',//mejorar para que el usuario no pueda digitar un precio de mas de 7 digitos
            'presentacion_producto' => 'required',
            'cantidad_producto' => 'required',//mejorar para que no se pueda digitar un numero de mas de 5 digitos
            'categoria_id' => [
                'required',
                'exists:categorias,id'//Verifica si el la categoria_id que seleccionamos existe en la tabla categoria como id
            ],
            'estado' => 'required',
        ];
    }

    public function messages()
    {
        return [
           'nombre.required' => 'El producto necesita un nombre',
            'precio_base.required' => 'El producto debe tener un precio base',
            'nombre.unique' => 'Este producto ya existe',
            'referencia.unique' => 'Esta referencia ya existe',
            'categoria_id.required' => 'El producto debe contener una categoria',
            'categoria_id.exists' => 'La categoria seleccionada no existe',
            'imagen_producto.mimes' => 'La archivo debe ser de tipo jpeg, png o jpg',
        ];
    }
}
