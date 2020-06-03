<?php

namespace App\Models\Caphum;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlantillaCargos extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table="caphum_plantilla_cargos";
    protected $fillable = ['area', 'categoria_ocupacional', 'tipo_categoria_ocupacional', 'cantidad_cargos', 'nivel_preparacion', 'grupo_escala', 'position'];


    public function tallas_vestidos_calzado()
    {
        return $this->hasMany('App\Models\Caphum\Tallas_vestidos_calzado', 'prendas');
    }

    public function areas()
    {
        return $this->belongsTo('App\Models\Caphum\Areas', 'id');
    }

    public function categoria_ocupacional()
    {
        return $this->belongsTo('App\Models\Caphum\CategoriasOcupacionales', 'id');
    }

    public function tipo_categoria_ocupacional()
    {
        return $this->belongsTo('App\Models\Caphum\TiposCategoriasOcupacionales', 'id');
    }

    public function nivel_preparacion()
    {
        return $this->belongsTo('App\Models\Caphum\NivelPreparacion', 'id');
    }

    public function grupo_escala()
    {
        return $this->belongsTo('App\Models\Caphum\GruposEscalas', 'id');
    }


    public function isUsed()
    {
        if($this->position<3)
            return true;

            return false;
    }

}
