<?php

namespace App\Models\Caphum;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Talla_persona_vestuario_institucional extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table="caphum_tallas_persona_vestuario_institucional";
    protected $fillable = ['persona_id', 'talla_id', 'prenda_id', 'position'];

    public function talla()
    {
        return $this->belongsTo('App\Models\Caphum\Tallas', 'id');
    }

    public function presona()
    {
        return $this->belongsTo('App\Models\Caphum\Presona', 'id');
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
