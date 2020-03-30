<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barrios extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table="barrios";
    protected $fillable = ['nombre', 'acronimo', 'municipios', 'position'];

    public function municipios()
    {
        return $this->belongsTo('App\Models\Municipios', 'id');
    }


    public function isUsed()
    {
        if($this->position<3)
            return true;

            return false;
    }

}
