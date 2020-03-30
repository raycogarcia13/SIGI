<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provincias extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table="provincias";
    protected $fillable = ['nombre', 'acronimo','position'];

    public function municipios()
    {
        return $this->hasMany('App\Models\Municipios', 'provincias');
        //return $this->hasMany('App\Models\Municipios');
    }

    public function isUsed()
    {
        if($this->position<3)
            return true;

            return false;
    }

}
