@extends('layouts.app')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker3.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="{{ asset('css/custom.css') }}">  
@section('estilos')
@endsection
@section('content')
{{-- Mensaje de error --}}
@if(session()->has('mensajeExitoLibro'))
    <br>
        <div class="alert alert-success">
            <div class="container h6">
                {{ session()->get('mensajeExitoLibro') }}
            </div>
        </div>
    <br>
@endif
{{-- Identificacion de usuario --}}
@if(Auth::user())
    <div class="bienvenida-text container text-center">
        <h1>Bienvenido {{ Auth::user()->name }}</h1>
    </div>

    {{-- Rol de autor--}}
    @if($rol[0]["nombre"] == 'Autor')
    <div class="proponer-btn">
        <div class="container mt-4 mb-5 ">
            <button type="button" onclick="mostrarForm()" class="btn-Contenido">Escribir nuevo articulo</button>
        </div>
    </div>    

    {{-- Si no es Autor identifica como Difusor--}}
    @else
        <div class="container text-center">
            <div class="row mt-5">
                <div class="divAutores">
                    <h3>Autores registrados</h3>
                </div>               
            </div>              
            <div class="">

                {{-- Autores registrados --}}
                <div class="">
                    <div class="list-group list-group-horizontal" id="list-tab" role="tablist">
                        @foreach($autores as $autor)
                            @if($loop->first)
                            {{--<div class="autoresdiv">--}}
                                <a class="autoresdiv list-group-item-action active primis" data-idQuery="{{ $autor->id }}" id="lA{{ $autor->id }}" data-toggle="list" href="#l{{ $autor->id }}" role="tab" aria-controls="home">{{ $autor->name }}</a>
                           {{--</div>                                --}}
                            @else
                            {{--<div class="autoresdiv2">--}}
                                <a class="autoresdiv2 list-group-item-action" data-idQuery="{{ $autor->id }}" id="lA{{ $autor->id }}" data-toggle="list" href="#l{{ $autor->id }}" role="tab" aria-controls="home">{{ $autor->name }}</a>
                            {{--</div>--}}
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="divSeleccion">
                    <h3>Selecciona el tema que puede abordar el autor</h3>
                    <br>
                </div>

                {{-- Permisos de cada autor --}}
                <div class="seccionesselec">
                    <div class="tab-content" id="nav-tabContent" style="margin-left: 600px;">
                        @foreach($categorias as $categoria)
                            <div class="col totalCat">      
                            <div class="seleccionesAct">    
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" class="checkBCat" data-idCat="{{ $categoria->id }}" aria-label="Checkbox for following text input">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control textBCat" id="textB{{ $categoria->id }}" aria-label="Text input with checkbox" readonly="true" value="{{ $categoria->nombre_cat }}">
                                </div>
                            </div>
                            </div>
                        @endforeach
                    </div>
                </div><div>                   
                </div>
                <br>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalNuevaSección">Agregar Sección</button>
            </div>
        </div>
    @endif
@else


{{-- Usuario Anonimo --}}
@endif    
<p class="tCat">CATEGORIAS</p>
<p class="sCat">SUBCATEGORIAS</p> 
<div class="categorias">

    <div class="">
        {{-- Muestreo de Categorias--}}
            <ul class="">
                @foreach($categorias as $categoria)
                    @if(is_null($categoria->catPadre))
                        <input name="categoriasPadre" style="visibility: hidden; display: none" value="{{ $categoria->id }}">
                        @if( $categoria->id <= 1)
                        <div class="ulcategorias">
                            <li class="nav-item main-nav-item" id="{{ $categoria->id }}">
                                <a class="textoa" href="#">{{ $categoria->nombre_cat }}</a>
                            </li>
                        </div>
                        <br>
                        @else
                        <div class="ulcategorias">
                            <li class="nav-item main-nav-item" id="{{ $categoria->id }}">
                                <a class="textoa" href="#">{{ $categoria->nombre_cat }}</a>
                            </li>
                        </div>
                        <br>
                        @endif
                    @else
                        <input name="categoriasHija" nombre="{{ $categoria->nombre_cat }}" padres="{{ $categoria->catPadre }}" style="visibility: hidden; display: none" value="{{ $categoria->id }}">
                    @endif
                @endforeach
            </ul>
</div>
        
{{-- Subcategorias--}}
<div class="subcategorias">
    <div class="contenedor">
        <ul class="ulcat">
            @foreach($categorias as $categoria)
                @if($categoria->catPadre > 0)
                    @if($categoria->catPadre == 1)
                        <li class="nav-item nav-item-sub " style="text-decoration:none;" nombCat="{{ $categoria->nombre_cat }}" idChildCat="{{ $categoria->id }}" id="{{ $categoria->catPadre }}" data-iden2="{{ $categoria->catPadre }}{{ $categoria->id }}">
                            <a class="nav-li" href="#">{{ $categoria->nombre_cat }}</a>
                        </li>
                    @else                   
                        <li class="nav-item oculto nav-item-sub" nombCat="{{ $categoria->nombre_cat }}" idChildCat="{{ $categoria->id }}" id="{{ $categoria->catPadre }}" data-iden2="{{ $categoria->catPadre }}{{ $categoria->id }}">
                            <a class="nav-li" href="#">{{ $categoria->nombre_cat }}</a>
                        </li>  
                    @endif
                @endif
            @endforeach
        </ul>
    </div>  
</div>
{{-- Secciones de los articulos (noticias) --}}
<div class="contenedor2">
    @foreach($libros as $libro)
        @if($libro->idcategoria <= 6)
            @foreach($categorias as $cate)
                @if($cate->id == $libro->idcategoria)
                    <div class="col-4 libros notas" id="{{ $libro->idcategoria }}" nombreLib="{{ $libro->nombre }}" nombreCat="{{ $cate->nombre_cat }}">                                                                    
                        <div class="">
                        <h5 class="tituloT">{{ $libro->nombre }}</h5>
                        <h6 class="autorT">{{ $libro->autor }}</h6>
                        <p class="descripcionT">{{ $libro->descripcion }}</p>
                        <div class="fechaActDiv">
                            <p class="actT"><small class="">Ultima actualización: {{ $libro->actualizado }}</small></p>
                        </div>
                    <div class="fechaPub">
                        Fecha de publicación: {{ $libro->fagregado }}
                        </div>
                    @if(auth()->check())
                        {{-- Opciones que se mostraran dependiendo si es autor, difusor o anonimo el usuario --}}
                        @if($rol[0]["nombre"] == 'Autor')
                            <div class="btnEdicion">
                                <button type="button" data-toggle="modal" data-libroid="{{ $libro->id }}" data-titulo="{{ $libro->nombre }}" data-descripcion="{{ $libro->descripcion }}" data-target="#edit" class="btn btn-success">Editar</button>
                            </div>
                            @elseif($rol[0]["nombre"] == 'Difusor')
                                <div class="">
                                    <button class="btn-version btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Versión
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownVersions">
                                        @foreach($versiones as $version)
                                            @if($version->idlibro == $libro->id)
                                                <a data-nombreLibro="{{ $version->nombre }}" data-descLibro="{{ $version->descripcion }}" data-verLibro="{{ $version->version }}.0" data-toggle="modal" data-target="#modalVersion" class="dropdown-item" href="#">{{ $version->version }}.0</a>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        @else
                    <div class="btnSus">
                        <button data-titulo="{{ $libro->nombre }}" data-toggle="modal" data-target="#modalSubscribirse" class="btnSuscri">
                            Suscribete
                        </button>
                    </div>
                    @endif
                </div>
                </div>
            @endif
        @endforeach
        <div class="brrs"></div>
        @else
        {{-- Articulos ocultos--}}
            @foreach($categorias as $cate)
            @if($cate->id == $libro->idcategoria)
            <div class="col-4 libros oculto notasOcultas" nombreLib="{{ $libro->nombre }}" id="{{ $libro->idcategoria }}" nombreCat="{{ $cate->nombre_cat }}">
                    <div class="">
                        <h5 class="tituloTo">{{ $libro->nombre }}</h5>
                        <h6 class="autorTo">{{ $libro->autor }}</h6>
                        <p class="descripcionTo">{{ $libro->descripcion }}</p>
                        <div class="fechaActDivo">
                            <p class="actTo"><small class="">Ultima actualización: {{ $libro->actualizado }}</small></p>
                        </div>
                        <div class="fechaPubo">
                            Fecha de publicación: {{ $libro->fagregado }}
                        </div>
                        {{-- Muestra el boton segun sea autor, difusor o anonimo--}}
                        @if(auth()->check())
                            @if($rol[0]["nombre"] == 'Autor')
                                <button type="button" data-libroid="{{ $libro->id }}" data-titulo="{{ $libro->nombre }}" data-descripcion="{{ $libro->descripcion }}" data-toggle="modal" data-target="#edit" class="btn btn-success">Editar</button>
                            @elseif($rol[0]["nombre"] == 'Difusor')
                            <div class="dropdown">
                                <button class="btn-version btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Versión
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownVersions">
                                        @foreach($versiones as $version)
                                            @if($version->idlibro == $libro->id)
                                                <a data-nombreLibro="{{ $version->nombre }}" data-descLibro="{{ $version->descripcion }}" data-verLibro="{{ $version->version }}.0" data-toggle="modal" data-target="#modalVersion" class="dropdown-item" href="#">{{ $version->version }}.0</a>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        @else
                        <button data-titulo="{{ $libro->nombre }}" data-toggle="modal" data-target="#modalSubscribirse" class="btnSuscrio">
                            Suscribete
                        </button>
                        @endif
                        <br><br><br><br>
                    </div>
                </div>
                @endif
            @endforeach
        @endif 
        @endforeach
    <div class="conten1"></div>
    </div>
    </div>
</div>

{{-- Difusor --}}
<div class="divSecciones">
@if(auth()->check())
        @if($rol[0]["nombre"] == 'Difusor')
            <h2 class="pendientes">Esperando Aprobación</h2>
             <div class="container">
            <div class="row">
            <div class="col-4 text-center ">
                @foreach($pendientes as $pendiente)
                    <div class="card-header border-divs">
                        Enviado: {{ $pendiente->fagregado }}
                    </div>
                    <div class="card-body">
                        <br>
                        <h5 class="card-title">
                            {{ $pendiente->nombre }}
                        </h5>
                        <h6 class="card-subtitle">
                            {{ $pendiente->autor }}
                        </h6>
                        <p class="card-text">
                            {{ $pendiente->descripcion }}
                        </p>
                        <form method="post" action="{{ route('articulos.update', 'none') }}" id="aceptarono">
                            @csrf
                            {{ method_field('patch') }}
                            <input type="hidden" id="siOno" name="siOno" value="false">
                            <input type="hidden" id="idLibroAceptar" name="idLibroAceptar" value="{{ $pendiente->id }}">
                            <input type="hidden" id="fpublicarL" name="fpublicarL" value="">
                            <input type="hidden" id="idAutor" name="idAutor" value="{{ $pendiente->user_iden }}">
                            <input class="form-control" type="hidden" id="razonNegadoHidden" name="razonNegadoHidden">
                            <button type="button" id="aprovado" class="btn btn-success" data-toggle="modal" data-target="#modalAprovacion">Aceptar</button>
                            <button type="button" id="denegado" data-toggle="modal" data-target="#razonNegadoModal" class="btn btn-danger">Rechazar</button>
                        </form>
                    </div>
                @endforeach
                </div>
                </div>
            </div>
        @else
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h2 style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif" class="text-center">Enviados para revisión</h2>
                </div>
                <div class="col-6">
                    <h2 style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif" class="text-center">Rechazados</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-6 text-center">
                    @foreach($pendientes as $pendiente)
                        @if($pendiente->user_iden ==  Auth::user()->id )
                            <div class="card-header border-divs">
                                Enviado: {{ $pendiente->fagregado }}
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">
                                    {{ $pendiente->nombre }}
                                </h5>
                                <h6 class="card-subtitle">
                                    {{ $pendiente->autor }}
                                </h6>
                                <p class="card-text">
                                    {{ $pendiente->descripcion }}
                                </p>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="col-6 text-center">
                    @foreach($rechazados as $rechazado)
                        @if($rechazado->user_id ==  Auth::user()->id )
                            <div class="card-header">
                                Articulo no aprovado: {{ $rechazado->nombre_libro }}
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">
                                    Razón
                                </h5>
                                <p class="card-text">
                                    {{ $rechazado->razón_eliminado }}
                                </p>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    @endif        
</div>    

{{-- Modal Nueva sección --}}
<div class="modal fade " id="modalNuevaSección" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header modal-titulo">
                <h5 class="modal-title" id="staticBackdropLabel">Nueva sección</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body  modal-cuerpo">
                <form method="POST" action="{{ route('nuevacat') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nombre_cat" style="color: white;  font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">Nombre: </label>
                            <input class="form-control" style="border-radius: 20px" type="text" id="nombre_cat" name="nombre_cat" required>
                        </div>
                        <div class="form-group">
                            <label for="subCat" style="color: white;  font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">Es subcategoría de: </label>
                            <select class="form-control" id="subCat" name="subCat" style="border-radius: 20px">
                                <option value="0">------</option>
                                @foreach($categoriasTodas as $cat)
                                    <option  value="{{ $cat->id }}">{{ $cat->nombre_cat }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button style="border-radius: 10px; font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;" type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button style="border-radius: 10px; font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;" type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Modal Agregar Articulo --}}
<section class="container-fluid" id="LibroForm">
        <form class="p-4 modal-nuevol" method="POST" action="{{ route('articulos.store') }}">
            @csrf
            <button type="button" class="close" aria-label="Close" onclick="mostrarForm()">
                    <span style="color: #E8E9EB;" aria-hidden="true">&times;</span>
            </button>
            <div class="form-group">
                <label class="texto-modal" for="nombreL">Titulo del articulo: </label>
                <input class="form-control" type="text" id="nombreL" name="nombreL">
            </div>
            <div class="form-group div-descrip">
                <label for="descripcionL" class="texto-modal">Descripción: </label>
                <textarea class="form-control txt-modal" type="text" id="descripcionL" name="descripcionL" rows="8" cols="10"></textarea>
            </div>
            <div class="form-group div-autor">
                <label for="autorL" class="texto-modal">Autor: </label>
                <input class="form-control" type="text" id="autorL" name="autorL">
            </div>
            <div class="form-group div-cati">
                <label for="categoriaL" class="texto-modal">Categoria: </label>
                <select class="form-control" name="categoriaL" id="categoriaL">
                    @if(count($categorias)==0)
                        <option id="x" value="x">
                            Contacta con un Difusor para obtener acceso a alguna categoria
                        </option>
                    @else
                        @foreach($categorias as $categoria)
                            <option id="{{ $categoria->id }}" value="{{ $categoria->id }}">
                                {{ $categoria->nombre_cat }}
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>
            <button style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif" type="submit" id="aproveEnv" class="btn btn-success btn-modal-enviar mb-2">Enviar para aprobacion</button>
            <br>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
</section>
    
<!-- Modal Editar-->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header modal-titulo">
            <h5 class="modal-title" id="edit">Editar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="POST" action="{{ route('articulos.update', '1') }}">
            @csrf
            {{ method_field('patch') }}
            <div class="modal-body modal-cuerpo">
                <div class="form-group">
                    <input type="hidden" name="idLibro" id="idLibro" value="">
                    <label style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; color: white; " for="nombreL">Nombre: </label>
                    <input style="border-radius: 6px" class="form-control" type="text" id="nombreL" name="nombreL">
                </div>
                <div class="form-group">
                    <label style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; color: white; " for="descripcionL">Descripción: </label>
                    <textarea style="border-radius: 6px" class="form-control" type="text" id="descripcionL" name="descripcionL" rows="4" cols="50"></textarea>
                </div>
                <button style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; border-radius: 6px" type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; border-radius: 6px"type="submit" class="btn btn-success">Guardar</button>
            </div>
        </form>
    </div>
</div>
</div>
    
<!-- Modal ver versiones-->
<div class="modal fade" id="modalVersion" tabindex="-1" role="dialog" aria-labelledby="modalVersion" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header modal-titulo">
        <h5 class="modal-title" id="modalVersion">Versiones</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modal-cuerpo">
        <label style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; color: white" for="nombreL">Version: </label>
        <input class="form-control" style="border-radius: 20px" type="text" id="verL" name="verL" readonly="" value="">
        <label style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; color: white" for="nombreL">Nombre: </label>
        <input class="form-control" style="border-radius: 20px" type="text" id="nomL" name="nombreL" readonly="" value="">
        <label style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; color: white" for="nombreL">Descripcion: </label>
        <textarea class="form-control" type="text" id="desL" name="descL" readonly="" value="" rows="4" cols="50"></textarea>
      </div>
      <div class="modal-footer modal-cuerpo">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Suscribirse-->
<div class="modal fade" id="modalSubscribirse" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header modal-titulo">
                <h5 class="modal-title" id="staticBackdropLabel">Ingrese su correo:</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="subscribirseForm" method="POST" action="{{ route('nuevosub') }}">
                <div class="modal-body modal-cuerpo">
                        @csrf
                        <label style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; color: white" for="emailAnonimo">Correo: </label>
                        <input style="border-radius: 6px"class="form-control" type="email" id="emailAnonimo" name="emailAnonimo" value="">
                        <input type="hidden" id="titLibroSub" name="titLibroSub" value="">
                </div>
                <div class="modal-footer modal-cuerpo">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Suscribir</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Articulo Pendiente-->
<div class="modal fade" id="razonNegadoModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-titulo">
                <h5 class="modal-title" id="staticBackdropLabel">Especifique un motivo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal-cuerpo">
                <textarea class="form-control" type="text" id="razonNegadoTxt" name="razonNegadoTxt" rows="4" cols="50"></textarea>
            </div>
            <div class="modal-footer modal-cuerpo">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" data-dismiss="modal" class="btn btn-success">Aceptar</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal Articulo Aprobado-->
<div class="modal fade" id="modalAprovacion" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center modal-titulo" style="display: inline;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="staticBackdropLabel">Ingrese la fecha de publicaación</h5><br>
                <small class="modal-sm">Deje vacio para publicar según fecha del autor</small>
            </div>
            <div class="modal-body modal-cuerpo">
                <div class='input-group date' id='datepickerL'>
                    <input type='text' class="form-control" id="fnpubliL" name="fnpubliL">
                    <span class="input-group-addon">
                    </span>
                </div>
            </div>
            <div class="modal-footer modal-cuerpo">
                
                <button type="button" data-dismiss="modal" class="btn btn-success">Aceptar</button>
            </div>
        </div>
    </div>
</div>


{{-- Seccion de Scripts--}}
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script> 
    <script type="text/javascript" src="{{ asset('js/articuloItem.js') }}">      
    </script>  
    <script type="text/javascript" src="{{ asset('js/articuloScript.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>

{{-- Script Checkbox --}}  
<script>
    $(function(){
        var autorActivo = $('#list-tab .active').attr("id");
        var idAutorActivo = $('#list-tab .active').attr("data-idQuery");
        var checkSeccionesPerm = $('.tab-content .checkBCat');
        var tituSeccionesPerm = $('.tab-content .textBCat');
        $.ajax({
            url: 'autor/{id}',
            method: "GET",
            data: {id: idAutorActivo},
            success : function(data){
                    $.each(data, function(a){
                        for(var i=0;i<tituSeccionesPerm.length;i++){
                            if(tituSeccionesPerm[i].value === data[a].nombre_cat){
                                checkSeccionesPerm[i].checked = true;
                            }
                        }
                    });
            }
        });
        $('#list-tab a').on('click', function(e){
            vaciarChecks();
            autorActivo = $(this).attr("data-idQuery");
            $.ajax({
                url: 'autor/{id}',
                method: "GET",
                data: {id: autorActivo},
                success : function(data){
                    $.each(data, function(a){
                        for(var i=0;i<tituSeccionesPerm.length;i++){
                            if(data[a].nombre_cat == tituSeccionesPerm[i].value){
                                checkSeccionesPerm[i].checked = true;
                            }
                        }
                    });
                }
            });
        });
    });
    function vaciarChecks(){
        var checkSeccionesPerm = $('.tab-content .checkBCat');
        for(var i=0;i<checkSeccionesPerm.length;i++){
            checkSeccionesPerm[i].checked = false;
        }
    } 
</script>  

    {{-- Permisos de usuario--}}  
    <script>
        $('.tab-content .checkBCat').on('click',function(e){
            var idAutorActivo = $('#list-tab .active').attr("data-idQuery");
            var nombAutorActivo = $('#list-tab .active').val();
            var idCategoria = $(this).attr("data-idCat");
            console.log(idCategoria,idAutorActivo);
            if($(this).is(':checked')){
                //check
                $.ajax({
                    method: "GET",
                    url: "dar_permisos/",
                    data: {idAutor:idAutorActivo, idCategoria:idCategoria},
                    success : function(data){
                        alert("Le haz dado permisos al usuario: "+data.name);
                    }
                });
            }else{
                $.ajax({
                    method: "GET",
                    url: "revocar_permisos/",
                    data: {idAutor:idAutorActivo, idCategoria:idCategoria},
                    success : function(data){
                        alert("Le haz quitado los permisos al usuario: "+data.name);
                    }
                });
            }
        });
    </script>
    
{{-- Script para fechas --}}    
    <script >
        $(function () {
            $('#datepicker').datepicker({
                format: "yyyy/mm/dd",
                autoclose: true,
                todayHighlight: true,
                showOtherMonths: true,
                selectOtherMonths: true,
                autoclose: true,
                changeMonth: true,
                changeYear: true,
                orientation: "button"
            });
            $('#datepickerL').datepicker({
                format: "yyyy/mm/dd",
                autoclose: true,
                todayHighlight: true,
                showOtherMonths: true,
                selectOtherMonths: true,
                autoclose: true,
                changeMonth: true,
                changeYear: true,
                orientation: "button"
            });
        });
    </script>
{{-- Script para modal Suscribir--}}
    <script>
        $('#modalSubscribirse').on('show.bs.modal', function(event){
            var modal=$(this);
            var botonSubscribirse = $(event.relatedTarget);
            $('#subscribirseForm').submit(function(event){
                event.preventDefault();
                var subForm = $(this);
                var email = subForm.find('#emailAnonimo').val();
                var titSubLibro = botonSubscribirse.data('titulo');
                var url = subForm.attr("action");
                subForm.find('#titLibroSub').val(titSubLibro);

                var _token = modal.find('input[name="_token"]').val();
                console.log(titSubLibro,email);
                $.ajax({
                    method: "POST",
                    url: url,
                    data: {email: email, tituloLibro: titSubLibro, _token:_token},
                    success : function(data){
                        alert("Suscrito a: \""+titSubLibro+"\"");
                            location.reload();
                    }
                });
            });
        });
    </script>
    {{-- Script para ver versiones --}}
    <script>
        $('#modalVersion').on('show.bs.modal', function(event){
            var a = $(event.relatedTarget);
            var modalNow = $(this);
            var version = a.attr("data-verLibro");
            var titulo = a.attr("data-nombreLibro");
            var descripcion = a.attr("data-descLibro");
            modalNow.find('.modal-body #verL').val(version);
            modalNow.find('.modal-body #nomL').val(titulo);
            modalNow.find('.modal-body #desL').val(descripcion);
        });
    </script>
{{-- Script para Editar --}}
    <script>
        $('#edit').on('show.bs.modal', function(event){
            var button = $(event.relatedTarget);
            var titulo = button.data('titulo');
            var descripcion = button.data('descripcion');
            var id = button.data('libroid');
            var modal = $(this);
            modal.find('.modal-body #nombreL').val(titulo);
            modal.find('.modal-body #descripcionL').val(descripcion);
            modal.find('.modal-body #idLibro').val(id);
        });
    </script>
{{-- Script de Aprobacion--}}
    <script>
        $('#modalAprovacion').on('hide.bs.modal', function(event){
            var fecha = $(this).find('.modal-body #fnpubliL').val();
            $('#siOno').val(true);
            if(fecha != null){
                $('#fpublicarL').val(fecha);
            }
        });
        $('#modalAprovacion').on('hidden.bs.modal', function(event){
            $('#aceptarono').submit();
        });

        $('#razonNegadoModal').on('hide.bs.modal', function(event){
            var razon = $(this).find('.modal-body #razonNegadoTxt').val();
            $('#razonNegadoHidden').val(razon);
            $('#siOno').val(false);
        });

        $('#razonNegadoModal').on('hidden.bs.modal', function(event){
            $('#aceptarono').submit();
        });
    </script>
@endsection