<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\FanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\PublicController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
 * El middleware auth solo comprueba si el usuario está autenticado
    El middleware role comprueba si es un artista/productor o fans, con el campo user == 1
  */

Route::get('/', [PublicController::class, 'index'])->name('principal');
Route::get('home', [AppController::class, 'home'])->name('home')->middleware('auth');
Route::get('homeUser', [AppController::class, 'homeUser'])->name('homeUser')->middleware('role');

Route::get('fans', [AppController::class, 'fans'])->name('fans')->middleware('auth');
Route::get('mostrarUser', [AppController::class, 'users'])->name('mostrarUser')->middleware('auth');



//Rutas de fans
Route::get('acceder', [FanController::class, 'acceder'])->name('acceder');
Route::post('autenticar', [FanController::class, 'autenticar'])->name('autenticar');
Route::get('registro', [FanController::class, 'registro'])->name('registro');
Route::post('registrarse', [FanController::class, 'registrarse'])->name('registrarse');
Route::get('perfil/{id}', [FanController::class, 'perfil'])->name('perfil')->middleware('auth');
Route::get('editarPerfil/{id}', [FanController::class, 'editarPerfil'])->name('editarPerfil')->middleware('auth');
Route::post('modificarUser/{id}', [FanController::class, 'modificarUser'])->name('modificarUser')->middleware('auth');
Route::get('salir', [FanController::class, 'salir'])->name('salir');


//Rutas de usuarios
Route::get('accederUser', [UserController::class, 'acceder'])->name('accederUser');
Route::post('autenticarUser', [UserController::class, 'autenticar'])->name('autenticarUser');
Route::get('registroUser', [UserController::class, 'registro'])->name('registroUser');
Route::post('registrarUser', [UserController::class, 'registrarse'])->name('registrarUser');

Route::get('salir', [UserController::class, 'salir'])->name('salir');


//Rutas de gestion de los proyectos
Route::get('formProyecto', [ProyectoController::class, 'form'])->name('formProyecto')->middleware('role');
Route::get('misProyectos', [ProyectoController::class, 'misproyectos'])->name('misProyectos')->middleware('role');
Route::post('crearProyecto', [ProyectoController::class, 'crear'])->name('crearProyecto')->middleware('role');
Route::get('editarProyecto/{id}', [ProyectoController::class, 'editar'])->name('editarProyecto')->middleware('role');
Route::post('modificarProyecto/{id}', [ProyectoController::class, 'modificarProyecto'])->name('modificarProyecto')->middleware('role');
Route::get('eliminarProyecto/{id}', [ProyectoController::class, 'eliminar'])->name('eliminarProyecto')->middleware('role');

//Rutas del funcionamiento de 'me gusta' y 'lista de reproduciones'
Route::get('mgProyectos/{id}',[AppController::class, 'mgProyectos'])->name('mgProyectos')->middleware('auth');
Route::get('ListaReprod/{id}',[AppController::class, 'ListaReprod'])->name('ListaReprod')->middleware('auth');

//Vistas del menu lateral
Route::get('favoritos', [UserController::class, 'favoritos'])->name('favoritos')->middleware('auth');
Route::get('lista_reprod', [UserController::class, 'lista_reprod'])->name('lista_reprod')->middleware('auth');
Route::get('tendencia', [UserController::class, 'tendencia'])->name('tendencia')->middleware('auth');
Route::get('mastop', [UserController::class, 'mastop'])->name('mastop')->middleware('auth');



//Buscador
Route::get('buscador', [AppController::class, 'buscador'])->name('buscador')->middleware('auth');
Route::get('buscar', [AppController::class, 'buscar'])->name('buscar')->middleware('auth');


