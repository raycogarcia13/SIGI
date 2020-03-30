<?php

namespace App\Models\Caphum;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ColorPiel extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table="caphum_color_piel";
    protected $fillable = ['nombre', 'acronimo','position'];


    public function isUsed()
    {
        if($this->position<3)
            return true;

            return false;
    }

}
