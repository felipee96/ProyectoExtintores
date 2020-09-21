<?php

namespace App\Http\Requests\Empresa;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaRequest extends FormRequest
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
            'nombre_empresa'=>'required|min:5',
            'nit'=>'required|min:5',
            'direccion'=>'required|min:5',
        ];
    }
    public function messages()
    {
        return [
            'nombre_empresa.required'=>'Ingresa nombre de la empresa',
            'nombre_empresa.min'=>'El nombre de la empresa debe contener más de 5 caracteres',

            'nit.required'=>'Ingresa nit de la empresa',
            'nit.min'=>'El nit de la empresa debe contener más de 5 caracteres',

            'direccion.required'=>'Ingresa direccion de la empresa',
            'direccion.min'=>'La direccion de la empresa debe contener más de 5 caracteres',
        ];
    }
}
