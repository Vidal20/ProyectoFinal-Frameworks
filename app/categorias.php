<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categorias extends Model
{
    protected $fillable = [
        'nombre_cat',
        'catPadre',
    ];

    protected $table = 'categorias';

    protected $primaryKey = 'id';

    public function users(){
    	return $this->belongsToMany('App\User')->withTimesTamps();
    }
}
