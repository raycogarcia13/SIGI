<?php

namespace App\Models\Caphum;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoriasLicenciasConduccion extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table="caphum_categorias_licencias_conduccion";
    protected $fillable = ['nombre', 'acronimo','position', 'especificacion'];


    public function isUsed()
    {
        if($this->position<3)
            return true;

            return false;
    }

}
