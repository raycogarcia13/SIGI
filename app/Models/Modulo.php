<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    protected $table="config_modulos";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'mostrar',
    ];


    public function permisos()
    {
        return $this->hasMany(Permiso::class);
    }
}
