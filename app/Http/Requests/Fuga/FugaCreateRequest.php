<?php

namespace App\Http\Requests\Fuga;

use Illuminate\Foundation\Http\FormRequest;

class FugaCreateRequest extends FormRequest
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
            'nombre_fuga' => 'required|min:5',
            'abreviacion_fuga' => 'required|min:1',
        ];
    }
    public function messages()
    {
        return [
            'nombre_fuga.required' => 'Ingresa nombre de la fuga',
            'nombre_fuga.min' => 'El nombre de la fuga  debe contener más de 5 caracteres',

            'abreviacion_fuga.required' => 'Ingresa nombre de la abreviacion',
            'abreviacion_fuga.min' => 'El nombre de la abreviacion  debe contener más de 1 caracteres',
        ];
    }
}
