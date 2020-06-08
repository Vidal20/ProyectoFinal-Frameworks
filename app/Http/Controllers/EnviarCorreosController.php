<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CorreoSubscriptor;
use App\subscriptores;
use App\libros;

class EnviarCorreosController extends Controller
{
    function nuevoSubscritor(Request $request){
    	$data = $request->get('tituloLibro');
    	$libro = libros::where('nombre',$request->get('tituloLibro'))->first();
    	$matchThese = ['email' => $request->get('email'), 'libroId' => $libro->id];

    	if(subscriptores::where($matchThese)->exists() != 1){
    		$subscriptor = new subscriptores();
	        $subscriptor->email = $request->get('email');
	        $subscriptor->libroId = $libro->id;
	        $subscriptor->save(); 	  
    	}else{
    		echo '';
    	}

    	
    }
}
