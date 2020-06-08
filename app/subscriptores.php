<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subscriptores extends Model
{
    protected $fillable = [
        'email',
        'libroId',
    ];

    protected $table = 'subscriptores';

    protected $primaryKey = 'id';
}
