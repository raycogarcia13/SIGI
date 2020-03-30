<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invitado extends Model
{
    public $table = 'config_invitado';
    
    public $fillable = ['nombre','detalles'];

    public function ci()
    {
        return 'ci';
    }
}
