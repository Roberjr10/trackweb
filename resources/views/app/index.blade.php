
@extends('layouts.app')

@section('content')
    <!--Contenedor de las paletas de registros-->

        <div class="container paleta-registro">
            <div class="row tex-center row-paleta">
                <div class="col-4 text-center registros" style="border-right: 3px solid black">
                    <a href="{{url('registroUser')}}"><h3 class="texto-registro">REGISTRARTE COMO ARTISTA</h3></a>
                </div>
                <div class="col-4 text-center registros" style="border-right: 3px solid black">
                    <a href="{{url('registroUser')}}"> <h3 class="texto-registro">REGISTRARTE COMO PRODUCTOR</h3></a>
                </div>
                <div class="col-4 text-center registros">
                    <a href="{{url('registro')}}"><h3 class="texto-registro">REGISTRARTE COMO FANS</h3></a>
                </div>
            </div>
        </div>
        <!--Contenedor de quienes somos-->
    <div class="container quienes-somos text-center">
        <p>Somos una pagina web que consiste en ayudar a los productores musicales y/o artista que buscan una oportunidad en el mundo de la musica, ofreciendole que puedan compartir y vender sus proyectos.</p>
    </div>

@endsection

