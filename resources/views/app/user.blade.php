
<?php
$role = "";
switch(@auth()->user()->user){
case 0:
$role = ".fan";
break;
case 1:
$role = ".login";
break;
}
?>
  @extends('layouts'.$role)

@section('content')
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
            <h2>Todos los Artistas y Productores</h2>
             <div class="col-12 lista-fans">
            <table class="table">
            <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Nick</th>
                <th scope="col">Email</th>
                <th scope="col">Fecha de creación</th>
            </tr>
            </thead>
            @foreach($rowset as $row)
            <tbody>
            <tr>
                <td scope="row">{{$row->nombre}}</td>
                <td>{{$row->nick}}</td>
                <td>{{$row->email}}</td>
                <td>{{$row->created_at}}</td>
            </tr>
            </tbody>
            @endforeach
        </table>
        </div>
    </div>
    </div>
    </div>
@endsection
