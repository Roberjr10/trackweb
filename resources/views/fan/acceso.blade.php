@extends('layouts.form')
@section('content')
    <div class="container">
    <form class="col m12 l6" method="POST" action="{{ route('autenticar') }}">

    @csrf

    <h2>Inicio de Sesión como Fans</h2>

    <div class="form-group col-6">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="form-group col-6">
        <label for="password">Contraseña:</label>
        <input type="password" class="form-control" id="password" name="password" minlength="8">
    </div>
        <div class="boton-form">
        <button type="submit" class="btn btn-warning">Iniciar Sesión</button>
        </div>
    </form>
    </div>
@endsection
