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
                           <div class="container">
                               <div class="row">
                                   <div class="col-3" style="margin: 2rem 0 2rem 0">

                                       <a href="{{url('editarPerfil/'.$row->id)}}"><button type="submit" class="btn btn-warning">Editar Perfil</button></a>

                                   </div>
                                   @php
                                   if(auth()->user()->user === 1){
                                    $texto = 'ARTISTA ó PRODUCTOR';

}else {
    $texto = 'FANS';
}
                                   @endphp
                                   <div class="col-8" style="margin: 2rem 0 2rem 0">
                                       <h3>MI PERFIL DE {{$texto}}</h3>
                                   </div>
                               </div>
                              <div class="perfil">
                                  <h5 style="display: inline">Nombre: </h5><p style="display: inline"> {{$row->nombre}}</p>
                                  <br>
                                  <br>
                                  <h5 style="display: inline">Apellidos: </h5><p style="display: inline"     > {{$row->apellidos}}</p>
                                  <br>
                                  <br>
                                  <h5 style="display: inline">Email: </h5><p style="display: inline"> {{$row->email}}</p>
                                  <br>
                                  <br>
                                  @php
                                  //Lógica para convertir el string en un array y contar cuantos proyectos te han gustado
                                    //y cuantos has añadido a la lista de reproducción
                                    $array_favoritos = array_filter(explode(';', $row->id_proyectos_mg));
                                    $array_lista =array_filter( explode(';', $row->id_proyectos_ListaRep));
                                  @endphp
                                  <h5 style="display: inline" >Proyectos que te han gustado: </h5><p style="display: inline"> {{count($array_favoritos)}} proyectos</p>
                                  <br>
                                  <br>
                                  <h5 style="display: inline">Proyectos en tu lista de reproducción: </h5><p style="display: inline"> {{count($array_lista)}} proyectos</p>
                              </div>
                           </div>

                       </div>
                   </div>
               </div>
           @endsection
