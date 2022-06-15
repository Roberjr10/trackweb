<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Fan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FanController extends Controller
{


    //
    public function acceder(){

        return view('fan.acceso');
    }

    public function autenticar(Request $request){

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);



     if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->intended('home')->withSuccess('Bienvenido');
        }
        return back()->withDanger('El usuario no se encuentra en la bases de datos!!');
    }

    public function registro(){
        return view('fan.registro');
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

        $fan = User::create([
            'nombre' => $data['nombre'],
            'apellidos' => $data['apellidos'],
            'nick' => $data['nick'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'fecha_nac' => $data['fecha_nac'],
            'user' => 0

        ]);
        Auth::login($fan);

            return redirect('home')->withSuccess('Te has registrado a trackweb');

    }

    public function salir(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function perfil($id){
        $row = User::where('id', $id)->firstOrFail();

        return view('app.perfil', ['row' => $row]);
    }

    public function editarPerfil($id){
        $row = User::where('id', $id)->firstOrFail();
        return view('app.editarPerfil', ['row' => $row]);
    }
    public function modificarUser(Request $request, $id){
        $row = User::findOrFail($id);



      User::where('id', $id)->update([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'nick' => $request->nick,
            'email' => $request->email,
            'password' =>  (!empty($request->cambiar_password)) ? Hash::make($request->cambiar_password) : $row->password,
            'fecha_nac' => $request->fecha_nac,
        ]);
        return redirect()->intended('perfil/'.$id);
    }
}
