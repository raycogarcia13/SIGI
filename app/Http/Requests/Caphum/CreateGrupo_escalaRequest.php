<?php

namespace App\Http\Requests\Caphum;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Caphum\Grupo_escala;

class CreateGrupo_escalaRequest extends FormRequest
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
        return Grupo_escala::$rules;
    }
}
