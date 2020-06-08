<?php

namespace App\Http\Controllers;

use App\libros;
use App\versiones;
use App\subscriptores;
use App\rechazados;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\CorreoSubscriptorActualizacion;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validarDatos = $request->validate([
            'nombreL' => 'required',
            'descripcionL' => 'required',
            'autorL' => 'required',
            'categoriaL' => 'required',
        ]);

        $nuevoLibro = new libros;
        $nuevoLibro->nombre = $request->input('nombreL');
        $nuevoLibro->descripcion = $request->input('descripcionL');
        $nuevoLibro->autor = $request->input('autorL');
        $nuevoLibro->idcategoria = $request->input('categoriaL');
        $nuevoLibro->actualizado = $request->input('fpubliL');
        $nuevoLibro->version = 1.0;
        $nuevoLibro->user_iden = Auth::user()->id;
        $nuevoLibro->save();
        
        $versionN = new versiones();
        $versionN->idlibro = $nuevoLibro->id;
        $versionN->version = $nuevoLibro->version;
        $versionN->nombre = $nuevoLibro->nombre;
        $versionN->descripcion = $nuevoLibro->descripcion;
        $versionN->save();

        return back()->with('mensajeExitoLibro', 'Articulo registrado, esperando aprobación');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\libros  $libros
     * @return \Illuminate\Http\Response
     */
    public function show(libros $libros)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\libros  $libros
     * @return \Illuminate\Http\Response
     */
    public function edit(libros $libros)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\libros  $libros
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if($request->has("siOno")){
            $libro = libros::where('id',$request->idLibroAceptar)->first();  
            if($request->siOno == "true"){
                $libro->aceptado = true;
                $libro->fagregado = $request->fpublicarL;
                $libro->save();
                return back()->with('mensajeExitoLibro', 'Publicación aceptada');
            }else{
                $rechazado = new rechazados;
                $rechazado->nombre_libro = $libro->nombre;
                $rechazado->razón_eliminado = $request->razonNegadoHidden;
                $rechazado->user_id = $request->idAutor;
                $rechazado->save();
                $libro->delete();
                return back()->with('mensajeExitoLibro', 'Publicación rechazada');
            }
        }else{
            $libro = libros::where('id',$request->idLibro)->first();

            $versionActual=$libro->version;
            $versionActual++;

            $libro->nombre = $request->nombreL;
            $libro->descripcion = $request->descripcionL;
            $libro->version = $versionActual;
            $libro->save();

            $versionN = new versiones();
            $versionN->idlibro = $libro->id;
            $versionN->version = $versionActual;
            $versionN->nombre = $request->nombreL;
            $versionN->descripcion = $request->descripcionL;
            $versionN->save();

            $subscriptor = subscriptores::where('libroId',$libro->id)->firstOrFail();
            if(!empty($subscriptor)){}
               

        }
        
        return back()->with('mensajeExitoLibro', 'Cambios realizados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\libros  $libros
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
    }
}
