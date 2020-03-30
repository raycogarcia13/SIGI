<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Municipios extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table="municipios";
    protected $fillable = ['nombre', 'acronimo', 'provincias', 'position'];

    public function provincias()
    {
        return $this->belongsTo('App\Models\Provincias', 'id');
    }

    public function barrios()
    {
        return $this->hasMany('App\Models\Barrios', 'municipios');
    }

    public function isUsed()
    {
        if($this->position<3)
            return true;

            return false;
    }

}
