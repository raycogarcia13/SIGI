<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    public $table = 'config_empresa';
    
    public $fillable = ['codigo','organismo','nombre','acronimo','logo','nae','dpa','reeup'];
    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'codigo' => 'required',
        'nombre' => 'required',
        'acronimo' => 'required',
        'organismo' => 'required',
        'logo' => 'image',
        'nae' => 'required',
        'dpa' => 'required',
        'reeup' => 'required'
    ];

}
