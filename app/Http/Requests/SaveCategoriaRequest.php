<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveCategoriaRequest extends FormRequest
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
            'nombre' => ['required',
                Rule::unique('categorias')->ignore($this->route('categoria'))
            ],
            'tipo' => 'required',
            'estado' => 'required',
        ];
    }

    public function messages()
    {
        return [
          'nombre.required' => 'La categoria necesita un nombre',
            'nombre.unique' => 'Ya existe una categoria con este nombre',
          'tipo.required' => 'La categoria necesita un tipo',
           'estado.required' => 'La categoria necesita un estado',
        ];
    }
}
