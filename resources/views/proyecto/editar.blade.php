@extends('layouts.login')

@section('content')
    <div class="container">
    <form class="col m12 l6" method="POST" action="{{ url('modificarProyecto/'.$row->id) }}" enctype="multipart/form-data">
        @csrf
        <h2>EDITAR PROYECTO</h2>

        <div class="form-group col-6">
            <label for="nombre">Nombre del proyecto:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{$row->nombre}}">
        </div>
        <div class="form-group col-6">
            <label for="Descripcion">Descripcion:</label>
            <input type="text" class="form-control" id="Descripcion" name="Descripcion" value="{{$row->Descripcion}}"  >
        </div>
        <div class="form-group col-6">
            <label for="audio">Sube tu proyecto con formato .mp3</label>
            <input type="file" class="form-control" id="audio" name="audio" value="{{$row->mptres}}">
        </div>
        <br>
        <div class="form-group col-6">
            <label for="imagen">Imagen del proyecto</label>
            <div class="editar_img">
                <span>Imagen</span>
                <input type="file" name="imagen" id="imagen" style="margin-bottom: 1rem">

                @if ($row->imagen)
                    {{ Html::image($row->imagen, $row->titulo, ['class' => 'responsive-img']) }}
                @endif
            </div>


        </div>
        <br>
        <div class="boton-form">
            <button type="submit" class="btn btn-warning" id="guardar" name="guardar">Guardar</button>
        </div>

    </form>

    </div>

@endsection
