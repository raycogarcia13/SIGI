<?php

namespace App\Models\Caphum;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoriasOcupacionales extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = "caphum_categorias_ocupacionales";
    protected $fillable = ['nombre', 'acronimo', 'tipo', 'position'];


    public function isUsed()
    {
        if($this->position<3)
            return true;

            return false;

    }

}
