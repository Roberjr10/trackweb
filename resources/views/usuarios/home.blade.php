@extends('layouts.login')

@section('content')
    <!--Título-->
    <div class="container titulo">

        <div class="row">
            <div class="col-3 btn-crearProyecto">
                <a href="{{url('formProyecto')}}"> <button class="btn-warning btn-login">Crear Proyecto</button></a>

            </div>
            <div class="col-8 text-center titulo_home">

                <h2>Proyectos Recientes</h2>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-xs-8 col-sm-8 col-md-4 col-lg-4">
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

            <!--Menú lateral-->

            <div class="col-xs-8 col-md-8 col-lg-8">
                <!--Bucle para reiterar los proyectos y crear cartas-->
                @foreach($rowset as $row)
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
                                    <audio src="http://15.188.57.221/trackweb/public/{{$row->mptres}}" controls ></audio>

                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <div class="card-text">
                                        <h5 class="card-title" style="display: inline">Productor:</h5> <span>{{$row->nombreUser}}</span>
                                        <br/>
                                        <h5 class="card-title" style="display: inline">Titulo:</h5><span>{{$row->nombre}}</span>
                                        <h5 class="card-title">Descripcion:</h5><p>{{$row->Descripcion}}</p>
                                    </div>
                                    <div class="card-image">

                                        <?php
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
                                        ?>
                                     <a href="{{url('mgProyectos/'.$row->id)}}" id="enlace">
                                         <img src="http://15.188.57.221/trackweb/public/img/img-rep/{{$corazon}}" alt="IMG CORAZON DE ME GUSTA">

                                     </a>
                                            <a href="{{url('ListaReprod/'.$row->id)}}" id="enlace">
                                                <img src="http://15.188.57.221/trackweb/public/img/img-rep/{{$check}}" alt="IMG CORAZON DE AÑADIR A LA LISTA DE REPRODUCCIÓN">

                                            </a>

                                    </div>

                                   <span style="margin-left: 10%">{{$row->cantidad_mg}} Me Gusta</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection



