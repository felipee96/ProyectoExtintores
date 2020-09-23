<?php

namespace App\Http\Requests\Actividad;

use Illuminate\Foundation\Http\FormRequest;

class ActividadCreateRequest extends FormRequest
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
            'nombre_actividad'=>'required|min:5',
            'abreviacion_actividad'=>'required|min:2'
        ];
    }
    public function messages()
    {
        return [
            'nombre_actividad.required'=>'Ingresa nombre de la actividad',
            'nombre_actividad.min'=>'El nombre de la actividad debe contener más de 5 caracteres',

            'abreviacion_actividad.required'=>'Ingresa abreviación de la actividad',
            'abreviacion_actividad.min'=>'La abreviación de la actividad debe contener más de 5 caracteres',

        ];
    }
}
