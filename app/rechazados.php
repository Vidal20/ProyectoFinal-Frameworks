<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rechazados extends Model
{
    protected $fillable = [
        'nombre_libro',
        'razón_eliminado',
        'user_id',
    ];

    protected $table = 'rechazados';

    protected $primaryKey = 'id';
}
