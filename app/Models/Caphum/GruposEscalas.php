<?php

namespace App\Models\Caphum;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class GruposEscalas
 * @package App\Models\Caphum
 * @version May 26, 2019, 11:46 pm CDT
 *
 * @property \Illuminate\Database\Eloquent\Collection
 * @property \Illuminate\Database\Eloquent\Collection caphumCargos
 * @property string nombre
 * @property float salario_escala
 * @property float tarifa_horaria
 * @property integer position
 *
 */
class GruposEscalas extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = "caphum_grupos_escalas";
    protected $fillable = ['nombre', 'salario_escala','tarifa_horaria', 'position'];


    public function isUsed()
    {
        if($this->position<3)
            return true;

            return false;

    }

}
