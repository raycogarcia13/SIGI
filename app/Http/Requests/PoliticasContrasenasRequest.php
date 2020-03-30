<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PoliticasContrasenasRequest extends FormRequest
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
            'longitud_minima'=>'required',
            'intentos_fallidos'=>'required',
            'notif_vencimiento'=>'required',
            'tiempo_validez'=>'required'
        ];
    }
}
