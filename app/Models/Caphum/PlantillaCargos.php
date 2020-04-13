<?php

namespace App\Models\Caphum;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlantillaCargos extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table="caphum_tallas_prenda_sexo";
    protected $fillable = ['prenda_id', 'sexo_id', 'talla_id'];
    //                        area, cargo, nivel, jefe, plazas, grupoescala, salario escala, categoría ocupacional, tipo, funcionario, designado, peligroso

    public function talla()
    {
        return $this->belongsTo('App\Models\Caphum\Tallas', 'id');
    }

    public function sexo()
    {
        return $this->belongsTo('App\Models\Caphum\Sexo', 'id');
    }

    public function preda()
    {
        return $this->belongsTo('App\Models\Caphum\Prendas', 'id');
    }


    public function isUsed()
    {
        if($this->position<3)
            return true;

            return false;
    }

}
