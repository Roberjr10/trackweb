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
            <div class="col-4">
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
            <div class="col-8">
                <form class="col m12 l6" method="GET" action="{{route('buscar')}}">
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
                <h5>Productores, Fans, Artistas ó Proyectos</h5>
                <hr>

                @if($user !== null)
                    @foreach($user as $row)

                        <h5>Usuarios</h5>

                    <div class="lista-fans">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Nick</th>
                                <th scope="col">Email</th>
                                <th scope="col">Fecha de creación</th>
                            </tr>
                            </thead>

                                <tbody>
                                <tr>
                                    <td scope="row">{{$row->nombre}}</td>
                                    <td>{{$row->nick}}</td>
                                    <td>{{$row->email}}</td>
                                    <td>{{$row->created_at}}</td>
                                </tr>
                                </tbody>
                        </table>

                    </div>
                            @endforeach

                            @endif
                    @if($proyecto !== null)

                        <!--Bucle para reiterar los proyectos y crear cartas-->
                        @foreach($proyecto as $row)
                            <h5>Proyectos</h5>

                            <div class="cartas ">
                                <div class="card mb-3">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <div class="container-equ">
                                            {{ Html::image($row->imagen, 'imagen del proyecto') }}
                                            <!-- <div class="equalizer">
                                        <div class="bar" id="bar1"></div>
                                        <div class="bar" id="bar2"></div>
                                        <div class="bar" id="bar3"></div>
                                        <div class="bar" id="bar4"></div>
                                        <div class="bar" id="bar5"></div>
                                        <div class="bar" id="bar6"></div>
                                        <div class="bar" id="bar7"></div>
                                    </div>-->
                                                <audio src="http://15.188.57.221/trackweb/public/{{$row->mptres}}" controls  onclick="activar()"></audio>
                                            </div>


                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body" style="margin-left: 25%">
                                                <div class="card-text">
                                                    <h5 class="card-title" style="display: inline">Productor:</h5> <span>{{$row->nombreUser}}</span>
                                                    <br/>
                                                    <h5 class="card-title" style="display: inline">Titulo:</h5><span>{{$row->nombre}}</span>
                                                    <h5 class="card-title">Descripcion:</h5><p>{{$row->Descripcion}}</p>
                                                </div>
                                                <div class="card-image">

                                                    @php
                                                        //


                                            //Funcion php para comprobar si esta en me gustas y poder cambiar la imagen
                                            $id_proyectos_mg = auth()->user()->id_proyectos_mg;
                                            $corazon = 'corazon.png';
                                            if(str_contains($id_proyectos_mg, $row->id )){
                                                $corazon =  'heart.png';
                                            }
                                            $id_proyectos_ListaRep = auth()->user()->id_proyectos_ListaRep;
                                            $check = 'plus.png';
                                        if(str_contains($id_proyectos_ListaRep, $row->id )){
                                            $check =  'accept.png';
                                        }

                                                    @endphp
                                                    <a href="{{url('mgProyectos/'.$row->id)}}" id="enlace" onclick="cambiarImagen()">
                                                        <img src="http://15.188.57.221/trackweb/public/img/img-rep/{{$corazon}}" alt="IMG CORAZON DE ME GUSTA">
                                                    </a>
                                                    <a href="{{url('ListaReprod/'.$row->id)}}" id="enlace">
                                                        <img src="http://15.188.57.221/trackweb/public/img/img-rep/{{$check}}" alt="IMG CORAZON DE AÑADIR A LA LISTA DE REPRODUCCIÓN">

                                                    </a>


                                                </div>
                                                <p>{{$row->cantidad_mg}} Me Gusta</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                            @else <div>No se ha encontrado ningun usuario</div>
                @endif

            </div>

        </div>
    </div>
@endsection
