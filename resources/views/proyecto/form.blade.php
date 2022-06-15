@extends('layouts.login')

@section('content')
    <div class="container">
    <form class="col m12 l6" method="POST" action="{{ route('crearProyecto') }}" enctype="multipart/form-data">
        @csrf
        <h2>CREAR PROYECTO</h2>

        <div class="form-group col-6">
            <label for="nombre">Nombre del proyecto:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required autofocus>
        </div>
        <div class="form-group col-6 ">
            <label for="Descripcion">Descripcion:</label>
            <textarea type="text" class="descripcion" id="Descripcion" name="Descripcion" required></textarea>
        </div>
        <div class="form-group col-6">
            <label for="audio">Sube tu proyecto con formato .mp3</label>
            <input type="file" class="form-control" id="audio" name="audio" accept=".mp3"required>
        </div>

        <div class="form-group col-6">
            <label for="imagen">Imagen del proyecto</label>
            <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*"required>
        </div>

        <button type="submit" class="btn btn-warning" name="guardar" id="guardar">Guardar</button>
    </form>
    </div>
@endsection
