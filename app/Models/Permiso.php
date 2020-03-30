<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $table="config_permisos";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'mostrar','modulo_id'
    ];

    public function Usuarios()
    {
        return $this->belongsToMany(App\User::class,'config_usuario_permiso','permiso_id');
    }

    public function modulo()
    {
        return $this->belongsTo(Modulo::class);
    }
}
