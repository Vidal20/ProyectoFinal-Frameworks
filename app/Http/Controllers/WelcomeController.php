<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categorias;
use App\libros;
use App\versiones;
use App\UserRol\Models\Rol;
use App\User;
use App\rechazados;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
   	function index(){

     // $categoriasHP = DB::table('categorias')->select('nombre_cat','id as id_catpadre')

   		$user = Auth::user();
   		$rol = null;
   		if($user != null){
   			$rol = $user->rols->map->only('nombre')->toarray();
   			if($rol[0]["nombre"] == "Autor"){
          $nombre = $user->name;
          $categorias = categorias::whereHas('users', function($q) use($nombre){
            $q->where('name',$nombre);
          })->get();
          $libros = libros::where("aceptado",true)->join('categorias_user', 'libros.idcategoria', 'categorias_user.categorias_id')->where('user_iden',$user->id)->get();
          //$libros = libros::join('categorias_user','libros.idcategoria','categorias_user.categorias_id')->join('categorias_user','libros.user_iden','categorias_user.user_id')->get();
        }else{
          $categorias = categorias::get()->all();
          $libros = libros::where("aceptado",true)->whereDate('fagregado', '<=', date('Y-m-d').'00:00:00')->get()->all();
        }
   		}else{
        $categorias = categorias::get()->all();
        $libros = libros::where("aceptado",true)->whereDate('fagregado', '<=', date('Y-m-d').'00:00:00')->get()->all();
        //dd($categorias);
      }
      $autores = User::whereHas('rols', function($q){
        $q->where('nombre', 'Autor');
      })->get();
   		//$libros = libros::where("aceptado",true)->get()->all();
   		$pendientes = libros::where("aceptado",false)->get()->all();
   		$versiones = versiones::get()->all();
      $categoriasTodas = categorias::whereNull('catPadre')->get()->all();
      $rechazados = rechazados::get()->all();

    	return view('welcome', compact('categorias', 'libros','pendientes','versiones', 'rol', 'autores', 'categoriasTodas','rechazados'));
    }

    function autores(Request $request){
      $idUserPrivCat = $request->id;
      $categorias = categorias::join('categorias_user', 'categorias_user.categorias_id', 'categorias.id')->where('categorias_user.user_id',$idUserPrivCat)->get();
      return $categorias;
    }

    function permisos(Request $request){
      $usuario = User::where("id",$request->idAutor)->first();
      $categoria = categorias::where("id",$request->idCategoria)->first();
      $categoria->users()->attach([$usuario['id']]);
      $categoria->save();
      return $usuario;
    }

    function revocar(Request $request){
      $usuario = User::where("id",$request->idAutor)->first();
      $categoria = categorias::where("id",$request->idCategoria)->first();
      $categoria->users()->detach([$usuario['id']]);
      $categoria->save();
      return $usuario;
    }

    function nuevacat(Request $request){
      $request->validate([
        'nombre_cat' => 'required|unique:categorias',
      ]);
      if($request->subCat == 0){
        $nuevaCat = new categorias();
        $nuevaCat->nombre_cat = $request->nombre_cat;
        $nuevaCat->save();
        return back();
      }else{
        $nuevaCat = new categorias();
        $nuevaCat->nombre_cat = $request->nombre_cat;
        $nuevaCat->catPadre = $request->subCat;
        $nuevaCat->save();
        return back();
      }
    }
}
