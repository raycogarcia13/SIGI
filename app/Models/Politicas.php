<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Politicas extends Model
{
    public $table = 'config_politicas_contrasenas';
    
    protected $updated_at=null;
    protected $created_at=null;

    public $fillable = [
        'longitud_minima',
        'intentos_fallidos',
        'notif_vencimiento',
        'tiempo_validez',
        'mayusculas',
        'numeros',
        'carac_especiales'
    ];

    public function usesTimestamps()
    {
        return false;
    }

}
