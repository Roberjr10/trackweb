<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Fan;
use App\Models\Proyecto;


class AppController extends Controller
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


    public function home(){
        $rowset = Proyecto::orderBy('created_at', 'DESC')->get();

        return view('fan.home',[
            'rowset'=> $rowset,
        ]);
    }

    public function homeUser(){
        $rowset = Proyecto::orderBy('created_at', 'DESC')->get();
        return view('usuarios.home',[
            'rowset' => $rowset,
        ]);
    }

    public function fans(){
        //Obtengo todos los fans ordenados por nombre
        $rowset = User::where('user', 0)->orderBy("nombre","ASC")->get();
        return view('app.fans',[
            'rowset' => $rowset,]);
    }

    public function users(){
        //Obtengo todos los fans ordenados por nombre
        $rowset = User::where('user', 1)->orderBy("nombre","ASC")->get();
        return view('app.user',[
            'rowset' => $rowset,]);
    }


    public function mgProyectos($id){
        //ID  del usuario
        $id_user = auth()->user()->id;


        $proyecto = Proyecto::findOrFail($id);


        $cantidad_mg = $proyecto['cantidad_mg'];


        //id del campo que tiene ese user en la bbdd
        $id_proyectos_mg = auth()->user()->id_proyectos_mg;
        //Si esta vacio lo recuperamos y si tiene algo le concatenamos el id
        if(empty($id_proyectos_mg)){
            $id_proyectos_mg = $id.';';
            $cantidad_mg++;
        }//Si el id esta dentro del string de los ids lo vamos a eliminar
        else if(str_contains($id_proyectos_mg, $id)){

            $id_proyectos_mg =  str_replace($id.';', "", $id_proyectos_mg);
            $cantidad_mg--;

        }
        else {
            $id_proyectos_mg = $id_proyectos_mg.$id.';';
            $cantidad_mg++;

        }
        Proyecto::where('id', $id)->update([
            'cantidad_mg' => $cantidad_mg,
        ]);
        //Lo subimos a la bdd
        User::where('id', $id_user)->update([
            'id_proyectos_mg' => $id_proyectos_mg
        ]);


        //Devuelve la url actual
        // print_r($_SERVER['HTTP_REFERER']);


        return redirect ($_SERVER['HTTP_REFERER']);


    }
    public function ListaReprod($id){
        //ID  del usuario
        $id_user = auth()->user()->id;
        $proyecto = Proyecto::findOrFail($id);

        $cantidad_list = $proyecto['cantidad_list'];

        //id del campo que tiene ese user en la bbdd
        $id_proyectos_ListaRep = auth()->user()->id_proyectos_ListaRep;

        //Si esta vacio lo recuperamos y si tiene algo le concatenamos el id
        if(empty($id_proyectos_ListaRep)){
            $id_proyectos_ListaRep = $id.';';
            $cantidad_list++;


        }//Si el id esta dentro del string de los ids lo vamos a eliminar
        else if(str_contains($id_proyectos_ListaRep, $id)){

            $id_proyectos_ListaRep =  str_replace($id.';', "", $id_proyectos_ListaRep);
            $cantidad_list--;
        }
        else {
            $id_proyectos_ListaRep = $id_proyectos_ListaRep.$id.';';
            $cantidad_list++;


        }
        Proyecto::where('id', $id)->update([
            'cantidad_list' => $cantidad_list,
        ]);
        //Lo subimos a la bdd
        User::where('id', $id_user)->update([
            'id_proyectos_ListaRep' => $id_proyectos_ListaRep,
        ]);

        //Devuelve la url actual
        // print_r($_SERVER['HTTP_REFERER']);

        return redirect ($_SERVER['HTTP_REFERER']);


    }

    public function buscador(){
        return view('app.buscador');
    }
    public function buscar(Request $request){
        if(!empty($request->get('buscador'))){
            $query = trim($request->get('buscador'));
            $user = User::where('nombre', 'LIKE', '%'.$query.'%')->get();
            $proyecto = Proyecto::where('nombre', 'LIKE', '%'.$query.'%')->get();

            return view('app.buscado', ['user' => $user, 'proyecto'=> $proyecto ]);
        }else

          return view('app.buscador');
    }


}
