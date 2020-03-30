<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    public $table = 'config_incio_sesion';
    
    protected $updated_at=null;
    protected $created_at=null;

    public $fillable = [ 'simultaneo', 'inactividad'];

    public function usesTimestamps()
    {
        return false;
    }
}
