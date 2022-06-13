@extends('layouts.fan')
@section('content')
    <div class="container">
        <form class="col m12 l6" method="POST" action="{{ url('modificarUser/'.$row->id) }}">
            @csrf
            <h2>Edita tú perfil</h2>

            <div class="form-group col-6">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{$row->nombre}}">
            </div>
            <div class="form-group col-6">
                <label for="apellidos">Apellidos:</label>
                <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{$row->apellidos}}">
            </div>
            <div class="form-group col-6">
                <label for="nick">Nick ó Alias:</label>
                <input type="text" class="form-control" id="nick" name="nick" value="{{$row->nick}}">
            </div>
            <div class="form-group col-6">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{$row->email}}">
            </div>
            <div class="form-group col-6">
                <label for="password">Contraseña:</label>
                <input type="password" class="form-control" id="cambiar_password" name="cambiar_password">
            </div>

            <div class="form-group col-6">
                <label for="fecha">Fecha de naciemiento:</label>
                <input type="date" class="form-control" id="fecha_nac" name="fecha_nac" value="{{$row->fecha_nac}}">
            </div>
            <div class="boton-form">
                <button type="submit" class="btn btn-warning" name="guardar" id="guardar">Guardar</button>


            </div>
        </form>
    </div>
@endsection
