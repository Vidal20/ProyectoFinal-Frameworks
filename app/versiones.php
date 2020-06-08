<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class versiones extends Model
{
    protected $fillable = [
        'version',
        'nombre',
        'descripcion',
    ];

    protected $table = 'versiones';

    protected $primaryKey = 'id';
}
