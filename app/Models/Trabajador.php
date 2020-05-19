<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trabajador extends Model
{
    public $table = 'caphum_trabajador';

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public $fillable = ['num','ci','nombre','primer_apellido','segundo_apellido','cla','ac','cies'];

}
