<?php

use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rols') -> insert([
        	'nombre' => 'Difusor',
        	'descripcion' => 'Difusor',
        ]);
        DB::table('rols') -> insert([
			'nombre' => 'Autor',
        	'descripcion' => 'Autor',
        ]);
    }
}
