<?php

use Illuminate\Database\Seeder;

class ArticulosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('libros') -> insert([
        	'nombre' => 'Android 12',
            'descripcion' =>
            'Posibles filtraciones para la nueva versión del S.O.',
            'autor' => 'Jorge David',
            'actualizado' => '2020-05-01',
            'aceptado' => true,
            'idcategoria' => '4',
            'user_iden' => '2',
        ]); 

        DB::table('libros') -> insert([
        	'nombre' => 'Fondo de pantalla crashea Dispositivos Samsumg',
            'descripcion' =>
            'Un fondo de pantalla puede breakear tu dispositivo por salir del rango de colores',
            'autor' => 'David Martinez',
            'actualizado' => '2020-05-11',
            'aceptado' => true,
            'idcategoria' => '4',
            'user_iden' => '2',
        ]);

        DB::table('libros') -> insert([
        	'nombre' => 'Bug expone ubicación de usuarios',
            'descripcion' =>
            'Un bug revela la ubicación de los usuarios con dispositivos iOS',
            'autor' => 'Antonio Bomaris',
            'actualizado' => '2020-03-01',
            'aceptado' => true,
            'idcategoria' => '5',
            'user_iden' => '2',
        ]);

        DB::table('libros') -> insert([
        	'nombre' => 'Realidad aumentada en iOS',
            'descripcion' =>
            'Las mejores aplicaciones para disfrutar de la VR en iOS',
            'autor' => 'George Smith',
            'actualizado' => '2020-01-24',
            'aceptado' => true,
            'idcategoria' => '5',
            'user_iden' => '2',
        ]);

        DB::table('libros') -> insert([
        	'nombre' => 'Nokia revive el mitico 5310',
            'descripcion' =>
            'Nokia lanza dispositivos y revive su clasico 5310',
            'autor' => 'Jorge Sanz',
            'actualizado' => '2020-03-19',
            'aceptado' => true,
            'idcategoria' => '6',
            'user_iden' => '2',
        ]);

            DB::table('libros') -> insert([
        	'nombre' => 'Black Berry K.O',
            'descripcion' =>
            'BB anuncia su retirada de los dispositivos Android',
            'autor' => 'Juan Savaleta',
            'actualizado' => '2020-02-18',
            'aceptado' => true,
            'idcategoria' => '6',
            'user_iden' => '2',
        ]);  

            DB::table('libros') -> insert([
        	'nombre' => 'Llega el procesador mas poderoso para gaming a México',
            'descripcion' =>
            'Intel lanza su nuevo procesador',
            'autor' => 'Jesus Gabriel',
            'actualizado' => '2020-04-05',
            'aceptado' => true,
            'idcategoria' => '7',
            'user_iden' => '2',
        ]);

            DB::table('libros') -> insert([
        	'nombre' => 'GAMEPC presenta una nueva gama de ordenadores para Gaming',
            'descripcion' =>
            'Nuevas configuraciones para jugadores de PC',
            'autor' => 'David Rodriguez',
            'actualizado' => '2020-03-14',
            'aceptado' => true,
            'idcategoria' => '7',
            'user_iden' => '2',
        ]);  

		DB::table('libros') -> insert([
		'nombre' => 'HDSTORE lanza Cronos y SuperNova, sus nuevas WorkStation',
		'descripcion' =>
		'Una nueva generación de equipos WS aparece en el mercado',
		'autor' => 'Vicente Lopez',
		'actualizado' => '2020-05-01',
		'aceptado' => true,
		'idcategoria' => '8',
		'user_iden' => '2',
		]);

		DB::table('libros') -> insert([
		'nombre' => '¿Podras trabajar desde casa con este PC?',
		'descripcion' =>
		'Intel lanza un equipos adecuado para Home Office',
		'autor' => 'Ernesto Flores',
		'actualizado' => '2020-04-02',
		'aceptado' => true,
		'idcategoria' => '8',
		'user_iden' => '2',
		]);  

		DB::table('libros') -> insert([
		'nombre' => '10 equipos personales ideales para Universitarios',
		'descripcion' =>
		'Las mejores opciones calidad-precio para universitarios',
		'autor' => 'Jesus Morales',
		'actualizado' => '2019-04-12',
		'aceptado' => true,
		'idcategoria' => '9',
		'user_iden' => '2',
		]);

		DB::table('libros') -> insert([
		'nombre' => 'EpicGames regala GTA V',
		'descripcion' =>
		'La tienda de videojuegos regala el famoso GTA V',
		'autor' => 'Jorge Sanchez',
		'actualizado' => '2020-05-28',
		'aceptado' => true,
		'idcategoria' => '10',
		'user_iden' => '2',
		]);  

		DB::table('libros') -> insert([
		'nombre' => 'RiotGames lanza Valorant',
		'descripcion' =>
		'Para hacer competencia a CS:GO RIOT LANZA VALORANT',
		'autor' => 'Ricardo Montes',
		'actualizado' => '2020-05-28',
		'aceptado' => true,
		'idcategoria' => '10',
		'user_iden' => '2',
		]);

		DB::table('libros') -> insert([
		'nombre' => 'XBOX lanzado en Japon a finales de año',
		'descripcion' =>
		'Portavoz de Microsoft anuncia la posible llegada territorio Nipon',
		'autor' => 'Martin Gonzales',
		'actualizado' => '2020-05-03',
		'aceptado' => true,
		'idcategoria' => '11',
		'user_iden' => '2',
		]);  

		DB::table('libros') -> insert([
		'nombre' => 'Retrocompatibilidad con PS5',
		'descripcion' =>
		'Los juegos de PS4 seran compatibles con la nueva consola? Es una duda que surge',
		'autor' => 'Emilia Calvario',
		'actualizado' => '2020-06-05',
		'aceptado' => true,
		'idcategoria' => '11',
		'user_iden' => '2',
		]);

		DB::table('libros') -> insert([
		'nombre' => 'COD Movil retraza su actualización',
		'descripcion' =>
		'Debidio a los movimientos sociales que acontesen, COD decide posponer su actualizacion',
		'autor' => 'Sergio Contal',
		'actualizado' => '2020-05-02',
		'aceptado' => true,
		'idcategoria' => '12',
		'user_iden' => '2',
		]);  

		DB::table('libros') -> insert([
		'nombre' => 'EpicGames va por GooglePlay',
		'descripcion' =>
		'EpicGames intentara incursionar en los dispositivos moviles',
		'autor' => 'Arturo Costel',
		'actualizado' => '2020-05-05',
		'aceptado' => true,
		'idcategoria' => '12',
		'user_iden' => '2',
		]);
    }
}
