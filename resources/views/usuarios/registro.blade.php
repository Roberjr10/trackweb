@extends('layouts.form')
@section('content')
<div class="container">
    <form class="col m12 l6" method="POST" action="{{ route('registrarUser') }}">
        @csrf
        <h2>Registrarte como Artista/Productor</h2>

        <div class="form-group col-6">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required autofocus>
        </div>
        <div class="form-group col-6">
            <label for="apellidos">Apellidos:</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" required>
        </div>
        <div class="form-group col-6">
            <label for="nick">Nick ó Alias:</label>
            <input type="text" class="form-control" id="nick" name="nick" required>
        </div>
        <div class="form-group col-6">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group col-6">
            <label for="password">Contraseña:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="form-group col-6">
            <label for="fecha">Fecha de naciemiento:</label>
            <input type="date" class="form-control" id="fecha_nac" name="fecha_nac" required>
        </div>
        <div class="boton-form">
        <button type="submit" class="btn btn-warning" name="guardar" id="guardar">Guardar</button>


        </div>
    </form>
</div>
@endsection
