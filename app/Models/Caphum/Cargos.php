<?php

namespace App\Models\Caphum;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cargos extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table="caphum_cargos";
    protected $fillable = ['area', 'cargo', 'nivel', 'jestablec', 'plazas', 'grupos_escala', 'categoria_oc', 'tipo_categoria_oc', 'funcionario', 'designado', 'peligroso'];

    // area, cargo, nivel, jefe, plazas, grupos escala, salario escala, categoría ocupacional, tipo, funcionario, designado, peligroso

    public function area()
    {
        return $this->belongsTo('App\Models\Caphum\Areas', 'id');
    }

    public function nivel()
    {
        return $this->belongsTo('App\Models\Caphum\NivelesPreparacion', 'id');
    }

    public function grupos_escala()
    {
        return $this->belongsTo('App\Models\Caphum\GruposEscala', 'id');
    }

    public function categoria_oc()
    {
        return $this->belongsTo('App\Models\Caphum\CategoriasOcupacionales', 'id');
    }

    public function tipo_categoria_oc()
    {
        return $this->belongsTo('App\Models\Caphum\TiposCategoriasOcupacionales', 'id');
    }


    public function isUsed()
    {
        if($this->position<3)
            return true;

            return false;
    }

}
