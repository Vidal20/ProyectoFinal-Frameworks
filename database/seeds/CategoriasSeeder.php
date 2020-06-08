<?php

use Illuminate\Database\Seeder;
use App\categorias;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoria = categorias::create([
        	'nombre_cat' => 'Dispositivos Moviles',
        ])->users()->attach([2]);    

        $categoria = categorias::create([
        	'nombre_cat' => 'Equipos de Computo',
        ])->users()->attach([2]);  

        $categoria = categorias::create([
        	'nombre_cat' => 'Videojuegos',
        ])->users()->attach([2]);   




        $categoria = categorias::create([
        	'nombre_cat' => 'Android',
        	'catPadre' => '1'
        ]);//->users()->attach([2]);   
        $categoria = categorias::create([
        	'nombre_cat' => 'iOS',
        	'catPadre' => '1'
        ])->users()->attach([2]);     
        $categoria = categorias::create([
        	'nombre_cat' => 'Retro',
        	'catPadre' => '1'
        ])->users()->attach([2]); 
        
        

        $categoria = categorias::create([
        	'nombre_cat' => 'Gaming',
        	'catPadre' => '2'
        ])->users()->attach([2]);   
        $categoria = categorias::create([
        	'nombre_cat' => 'WorkStation',
        	'catPadre' => '2'
        ])->users()->attach([2]);     
        $categoria = categorias::create([
        	'nombre_cat' => 'Personal',
        	'catPadre' => '2'
        ])->users()->attach([2]);   


        $categoria = categorias::create([
        	'nombre_cat' => 'PC',
        	'catPadre' => '3'
        ])->users()->attach([2]);   
        $categoria = categorias::create([
        	'nombre_cat' => 'Consolas',
        	'catPadre' => '3'
        ])->users()->attach([2]);     
        $categoria = categorias::create([
        	'nombre_cat' => 'Moviles',
        	'catPadre' => '3'
        ])->users()->attach([2]);      
    }
}
