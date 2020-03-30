<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioEditRequest extends FormRequest
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
            'username'=>'required',
            'password'=>'confirmed',
            'is_trabajador'=>'required',
            'trabajador_id'=>'requiredIf:is_trabajador,true',
            'invitado'=>'requiredIf:is_trabajador,false',
            'invitado_id'=>'requiredIf:is_trabajador,false',
            // requiredIf
        ];
    }
}
