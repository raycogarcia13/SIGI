<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Auditoria extends Model
{
    public $table = 'config_auditoria';

    protected $fillable=['usuario_id','ip_pc','modulo','accion','metodo','consulta'];


    public function usuario()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function persona()
    {
        if($this->usuario->trabajador)
            return $this->usuario->trabajador->nombre." ".$this->usuario->trabajador->primer_apellido." ".$this->usuario->trabajador->nombre;
        else
            return $this->usuario->invitado->nombre;
    }
}
