@extends('layouts.login')

@section('content')
    <!--Título-->
    <div class="container titulo">

        <div class="row">
            <div class="col-3 btn-crearProyecto">
                <a href="{{url('formProyecto')}}"> <button class="btn-warning btn-login">Crear Proyecto</button></a>

            </div>
            <div class="col-8 text-center titulo_home">

                <h2>Mis proyectos</h2>
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
            <div class="col-xs-6 col-sm-8 col-md-9 col-lg-9 ">
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
                                    </div>
                                    <audio src="http://15.188.57.221/trackweb/public/{{$row->mptres}}" controls  onclick="activar()"></audio>

                                </div>
                                <div class="col-md-8">
                                    <!-- Example single danger button -->
                                    <div class="btn-group float-end" style="margin: 10px">
                                        <button type="button" class="btn btn-warning dropdown-toggle"data-bs-toggle="dropdown" aria-expanded="false">
                                            ...
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{url ('editarProyecto/'.$row->id)}}">Editar</a></li>
                                            <li><a class="dropdown-item" href="{{url('eliminarProyecto/'.$row->id)}}">Eliminar</a></li>
                                        </ul>
                                    </div>
                                    <div class="card-body">

                                        <div class="card-text">
                                            <h5 class="card-title" style="display: inline">Productor:</h5> <span>{{$row->nombreUser}}</span>
                                            <br/>
                                            <h5 class="card-title" style="display: inline">Titulo:</h5><span>{{$row->nombre}}</span>
                                            <h5 class="card-title">Descripcion:</h5><p>{{$row->Descripcion}}</p>
                                        </div>

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

