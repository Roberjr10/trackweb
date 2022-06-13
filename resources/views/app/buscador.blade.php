<?php

$role = "";
switch(@auth()->user()->user){

case 1:
$role = ".login";
break;
case 0:
$role = ".fan";
break;
}

?>


@extends('layouts'.$role)
@section('content')

    <div class="container titulo">
        <div class="row">
            <div class="col-12 text-center" style="margin: 2%">
                <h3>Busca tu proyecto ó usuario deseado</h3>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <!--Menú lateral-->
            <div class="col-3">
                <nav class="navbar navbar-expand-lg navbar-light menu2">
                    <div class="container-fluid ">

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup2" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse menu_lateral" id="navbarNavAltMarkup2">
                            <div class="navbar-nav lateral">

                                <ul>
                                    @if(auth()->user()->user == 1 )
                                        <li><a href="{{route('misProyectos')}}">Mis proyectos</a></li>
                                    @endif
                                    <br/>
                                    <li><a href="{{route('favoritos')}}">Proyectos que te han gustado</a></li>
                                    <br/>
                                    <li><a href="{{route('lista_reprod')}}">Lista de repdroduciones</a></li>
                                    <br/>
                                    <li><a href="{{route('tendencia')}}">Proyectos en tendencia</a></li>
                                    <br/>
                                    <li><a href="{{route('mastop')}}">Más añadidos</a></li>
                                    <br/>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="col-9">
                <form  method="GET" action="{{route('buscar')}}">
                    @csrf
                <div class="row" >
                    <div class="search">
                    <label for="buscador" style="margin: 1%;"><h3>Buscador</h3></label> <br>

                    <input class = "col-8" type="text" class="form-control"name="buscador" id="buscador">

                    <button type="submit" class = " btn-buscador" class="col-2" name="buscar" id="buscar"> <img src="http://15.188.57.221/trackweb/public/img/img-rep/buscador.png" alt="IMG DE LA LUPA DEL BUSCADOR">
                    </button>
                    </div>
                </div>
                </form>

            </div>
        </div>
    </div>
@endsection
