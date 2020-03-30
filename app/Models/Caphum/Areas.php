<?php

namespace App\Models\Caphum;

use Illuminate\Database\Eloquent\Model;

class Areas extends Model
{
    //
    public $table = 'caphum_areas';

    public $fillable = ['id,nombre,pertenece,tipo_area' ];
}
