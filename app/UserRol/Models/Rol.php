<?php

namespace App\UserRol\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    //
    protected $fillable = [
        'nombre', 'descripcion',
    ];

    public function users(){
    	return $this->belongsToMany('App\User')->withTimesTamps();
    }
}
