<?php

namespace App\Models\Caphum;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prendas extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table="caphum_prendas";
    protected $fillable = ['nombre', 'acronimo', 'position'];

    public function tallas_vestidos_calzado()
    {
        return $this->hasMany('App\Models\Caphum\Tallas_vestidos_calzado', 'prendas');
    }


    public function isUsed()
    {
        if($this->position<3)
            return true;

            return false;
    }

}
