<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use Illuminate\Http\UploadedFile;
use Image;


class ProyectoController extends Controller
{
    //
    public function __construct()
    {
        /**
         * Asigno el middleware auth al controlador,
         * de modo que sea necesario estar al menos autenticado
         */
        $this->middleware('auth');
    }

    public function form()
    {
        return view('proyecto.form');
    }

    public function crear(Request $request)
    {

        //print_r($_FILES['mptres']);
        $nombreUser = auth()->user()->nick;
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');

            $nombreOriginal = $file->getClientOriginalName();
            $nombre = str_replace(" ", "", $nombreOriginal);
            $path = public_path('imgProyectos/' . $nombre);
            $url = '/imgProyectos/' . $nombre;
            $image = Image::make($file->getRealPath())->resize(250, 250);
            $image->save($path);
        }
        if ($request->hasFile('audio')) {
            $archivo = $request->file('audio');


            $nombre_audio_original = $archivo->getClientOriginalName();
            $nombre_audio = str_replace(" ", "", $nombre_audio_original);

            $archivo->move(public_path() . '/audioProyectos/', $nombre_audio);
            $mp3 = '/audioProyectos/' . $nombre_audio;

        }



        $proyecto = $request->all();

        Proyecto::create([
            'nombreUser' => $nombreUser,
            'nombre' => $proyecto['nombre'],
            'Descripcion' => $proyecto['Descripcion'],
            'mptres' => $mp3,
            'imagen' => $url,
        ]);

        return redirect()->intended('homeUser')->withSucces('Has creado el proyecto correctamente');


    }

    public function misProyectos() {
        $nombreUser = auth()->user()->nick;
        $rowset = Proyecto::where('nombreUser', $nombreUser)->get();

        return view('proyecto.misproyectos',[
            'rowset' => $rowset
        ]);
    }

    public  function editar($id){

        $row = Proyecto::where('id', $id)->firstOrFail();
        return view('proyecto.editar',[
            'row' => $row
        ]);
    }

    public  function modificarProyecto(Request $request, $id){

      $project =  Proyecto::where('id', $id)->update([
            'nombre' => $request->nombre,
            'Descripcion' => $request->Descripcion,


        ]);
        if($request->hasFile('audio')) {
            $archivo = $request->file('audio');

            $nombre_audio_original = $archivo->getClientOriginalName();
            $nombre_audio = str_replace(" ", "", $nombre_audio_original);


            $archivo->move(public_path().'/audioProyectos/', $nombre_audio);
            $mp3 = '/audioProyectos/'. $nombre_audio;
            Proyecto::where('id', $id)->update(['mptres' => $mp3]);

        }

        if($request->hasFile('imagen')) {
            $file = $request->file('imagen');

            $nombreOriginal = $file->getClientOriginalName();
          $nombre = str_replace(" ", "", $nombreOriginal);

            $path = public_path('imgProyectos/' . $nombre);
            $url = '/imgProyectos/' . $nombre;
            $image = Image::make($file->getRealPath())->resize(250, 150);
            $image->save($path);
            Proyecto::where('id', $id)->update(['imagen' => $url]);
        }

        return redirect()->intended('misProyectos')->withSuccess('Se ha editado correctamente');

    }

public function eliminar($id){
    $row = Proyecto::findOrFail($id);
    Proyecto::destroy($row->id);

    //Eliminar audio
    $audio = public_path().'/audioProyectos/'.$row->mptres;
    if(file_exists($audio)){
        unlink($audio);
    }
    //Eliminar imagen
    $imagen = public_path().'/imgProyectos/'.$row->imagen;
    if(file_exists($imagen)){
        unlink($imagen);
    }

    return redirect('misProyectos');


    }




}
