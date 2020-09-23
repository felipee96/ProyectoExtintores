<?php

namespace App\Http\Requests\CambioPartes;

use Illuminate\Foundation\Http\FormRequest;

class CambioPartesCreateRequest extends FormRequest
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
            'nombre_parte_cambio'=>'required|min:5',
        ];
    }
    public function messages()
    {
        return [
            'nombre_parte_cambio.required'=>'Ingresa nombre del cambio de parte de extintores',
            'nombre_parte_cambio.min'=>'El nombre del cambio de parte de extintores debe contener más de 5 caracteres',
        ];
    }
}
