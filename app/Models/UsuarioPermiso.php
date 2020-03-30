<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

/** 
* Class User
* @licence GPL 3
* 
*/ 
class UsuarioPermiso extends Model
{
    protected $table="config_usuario_permiso";
    
    protected $fillable = [
        'usuario_id', 'permiso_id',
    ];

    // public function Usuario()
    // {
    //     return $this->belongsTo(User::class);
    // }
    
    // public function Permiso()
    // {
    //     return $this->belongsTo(Permiso::class);
    // }
}
