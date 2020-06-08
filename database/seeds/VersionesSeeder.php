<?php

use Illuminate\Database\Seeder;

class VersionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('versiones') -> insert([
        	'idlibro' => '1',
            'version' =>
            1.0,
            'nombre' => 'Android 12',
            'descripcion' => 'Posibles filtraciones para la nueva versión del S.O.',
        ]); 

        DB::table('versiones') -> insert([
        	'idlibro' => '2',
            'version' =>
            1.0,
            'nombre' => 'Fondo de pantalla crashea Dispositivos Samsumg',
            'descripcion' =>
            'Un fondo de pantalla puede breakear tu dispositivo por salir del rango de colores',
        ]); 

        DB::table('versiones') -> insert([
        	'idlibro' => '3',
            'version' =>
            1.0,
            'nombre' => 'Bug expone ubicación de usuarios',
            'descripcion' =>
            'Un bug revela la ubicación de los usuarios con dispositivos iOS',
        ]); 

        DB::table('versiones') -> insert([
        	'idlibro' => '4',
            'version' =>
            1.0,
            'nombre' => 'Realidad aumentada en iOS',
            'descripcion' =>
            'Las mejores aplicaciones para disfrutar de la VR en iOS',
        ]); 

        DB::table('versiones') -> insert([
        	'idlibro' => '5',
            'version' =>
            1.0,
            'nombre' => 'Nokia revive el mitico 5310',
            'descripcion' =>
            'Nokia lanza dispositivos y revive su clasico 5310',
        ]); 

        DB::table('versiones') -> insert([
        	'idlibro' => '6',
            'version' =>
            1.0,
            'nombre' => 'Black Berry K.O',
            'descripcion' =>
            'BB anuncia su retirada de los dispositivos Android',
        ]); 

        DB::table('versiones') -> insert([
        	'idlibro' => '7',
            'version' =>
            1.0,
            'nombre' => 'Llega el procesador mas poderoso para gaming a México',
            'descripcion' =>
            'Intel lanza su nuevo procesador',
        ]); 

        DB::table('versiones') -> insert([
        	'idlibro' => '8',
            'version' =>
            1.0,
            'nombre' => 'GAMEPC presenta una nueva gama de ordenadores para Gaming',
            'descripcion' =>
            'Nuevas configuraciones para jugadores de PC',
        ]); 

        DB::table('versiones') -> insert([
        	'idlibro' => '9',
            'version' =>
            1.0,
            'nombre' => 'HDSTORE lanza Cronos y SuperNova, sus nuevas WorkStation',
		'descripcion' =>
		'Una nueva generación de equipos WS aparece en el mercado',
        ]); 

        DB::table('versiones') -> insert([
        	'idlibro' => '10',
            'version' =>
            1.0,
            'nombre' => '¿Podras trabajar desde casa con este PC?',
		'descripcion' =>
		'Intel lanza un equipos adecuado para Home Office',
        ]); 

        DB::table('versiones') -> insert([
        	'idlibro' => '11',
            'version' =>
            1.0,
            'nombre' => '10 equipos personales ideales para Universitarios',
		'descripcion' =>
		'Las mejores opciones calidad-precio para universitarios',
        ]); 

        DB::table('versiones') -> insert([
        	'idlibro' => '12',
            'version' =>
            1.0,
            'nombre' => 'EpicGames regala GTA V',
		'descripcion' =>
		'La tienda de videojuegos regala el famoso GTA V',
        ]); 

        DB::table('versiones') -> insert([
        	'idlibro' => '13',
            'version' =>
            1.0,
            'nombre' => 'RiotGames lanza Valorant',
		'descripcion' =>
		'Para hacer competencia a CS:GO RIOT LANZA VALORANT',
        ]); 

        DB::table('versiones') -> insert([
        	'idlibro' => '14',
            'version' =>
            1.0,
            'nombre' => 'XBOX lanzado en Japon a finales de año',
		'descripcion' =>
		'Portavoz de Microsoft anuncia la posible llegada territorio Nipon',
        ]); 

        DB::table('versiones') -> insert([
        	'idlibro' => '15',
            'version' =>
            1.0,
            'nombre' => 'Retrocompatibilidad con PS5',
		'descripcion' =>
		'Los juegos de PS4 seran compatibles con la nueva consola? Es una duda que surge',
        ]); 

        DB::table('versiones') -> insert([
        	'idlibro' => '16',
            'version' =>
            1.0,
            'nombre' => 'COD Movil retraza su actualización',
		'descripcion' =>
		'Debidio a los movimientos sociales que acontesen, COD decide posponer su actualizacion',
        ]); 

        DB::table('versiones') -> insert([
        	'idlibro' => '17',
            'version' =>
            1.0,
            'nombre' => 'EpicGames va por GooglePlay',
		'descripcion' =>
		'EpicGames intentara incursionar en los dispositivos moviles',
        ]);
    }
}
