<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Proyecto;


class UserController extends Controller
{

    public function acceder(){

            return view('usuarios.acceso');
        }

    public function autenticar(Request $request){

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);



        if(Auth::attempt($credentials) && Auth::user()->user == 1){
            $request->session()->regenerate();

            return redirect()->intended('homeUser')->withSuccess('Bienvenido');
        }
        return back()->withError([
            'email' => 'El email no esta registrado'
        ]);
    }
    public function registro(){
        return view('usuarios.registro');
    }
    public function registrarse(Request $request){

        $request->validate([
            'nombre'=> 'required',
            'nick' => 'required|unique:users|max:10',
            'email'=> 'required|email|unique:users',
            'password' =>'required|min:8'
        ]);
        //Sirve para convertir el objeto request en array
        $data = $request->all();
        var_dump($data);

        $user = User::create([
            'nombre' => $data['nombre'],
            'apellidos' => $data['apellidos'],
            'nick' => $data['nick'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'fecha_nac' => $data['fecha_nac'],
            'user' => 1

        ]);
        if(isset($user)) {
            Auth::login($user);
            return redirect('homeUser')->withSuccess('Te has registrado a trackweb');
        }else {
            return redirect('registroUser')->withDanger('Error, tu nick debe tener 10 caracteres y la contraseña debe de tener una longitud de 8.');
        }
    }

    public function salir(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function favoritos()
    {
        $id_proyectos_mg = Auth::user()->id_proyectos_mg;
        //Si queda un valor vacio no lo coge
        $array_id = array_filter(explode(';', $id_proyectos_mg));
        $array_proyectos = [];
        foreach ($array_id as $id){

           $proyectos = Proyecto::find($id);
           if($proyectos) {
               array_push($array_proyectos, $proyectos);

           }

        }



        return view('app.favoritos', ['rowset' => $array_proyectos]);


    }

    public function lista_reprod()
    {
        $id_proyectos_ListaRep = Auth::user()->id_proyectos_ListaRep;
        //Si queda un valor vacio no lo coge
        $array_id = array_filter(explode(';', $id_proyectos_ListaRep));
        $array_proyectos = [];
        foreach ($array_id as $id){

            $proyectos = Proyecto::find($id);
            if($proyectos) {
                array_push($array_proyectos, $proyectos);

            }

        }

        return view('app.listareprod', ['rowset' => $array_proyectos]);
    }

    public function tendencia()
    {
        $proyectos = Proyecto::orderBy('cantidad_mg', 'DESC')->get();

        return view('app.tendencia', ['rowset' => $proyectos]);
    }


    public function mastop(){
        $proyectos = Proyecto::orderBy('cantidad_list', 'DESC')->get();

        return view('app.mas', ['rowset' => $proyectos]);
    }
}
