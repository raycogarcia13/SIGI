<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Trabajador;
use App\Models\Invitado;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;

    use SoftDeletes;
 
    protected $dates = ['deleted_at'];

    protected $table="config_usuario";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password','activo','is_trabajador','position'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function Permisos()
    {
        return $this->belongsToMany(Models\Permiso::class,'config_usuario_permiso','usuario_id');
    }

    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class,'trabajador_id','id');
    }

    public function invitado()
    {
        return $this->belongsTo(Invitado::class,'invitado_id','id');
    }


    public function persona()
    {
        if($this->is_trabajador)
            return $this->belongsTo(Trabajador::class,'trabajador_id','id');
        else
            return $this->belongsTo(Invitado::class,'invitado_id','id');
    }

    public function getNombre()
    {
        if($this->is_trabajador)
            return $this->trabajador->nombre." ".$this->trabajador->primer_apellido." ".$this->trabajador->segundo_apellido;
        else
            return $this->invitado->nombre." ".$this->invitado->primer_apellido." ".$this->invitado->segundo_apellido;
    }

    public function getCi()
    {
        
        if($this->is_trabajador)
            return $this->trabajador->ci;
        else
            return $this->invitado->ci;
    }

    public function hasRol($r)
    {
        $roles=$this->Permisos()->get();
        foreach ($roles as $rol) {
            if($rol->nombre===$r)
                return true;
        }
        return false;
    }

    public function isUsed()
    {
        return true;
    }

}
