<?php

namespace App\Models\Caphum;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tallas_prenda_sexo extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table="caphum_tallas_prenda_sexo";
    protected $fillable = ['prenda_id', 'sexo_id', 'talla_id'];

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
