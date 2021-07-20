<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AuthController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/dashboard/usuarios', [UsuarioController::class, 'listado']);
Route::resource('usuarios', UsuarioController::class);

//login
Route::post('/auth', [AuthController::class, 'auth'])->name('auth');

//Crear//
Route::get('/dashboard/usuarios/create/new', [UsuarioController::class, 'new'])->name('a.new');
Route::get('/dashboard/usuarios/create/newp', [UsuarioController::class, 'newp'])->name('p.new');
Route::get('/dashboard/usuarios/create/newm', [UsuarioController::class, 'newm'])->name('m.new');
Route::get('/dashboard/usuarios/create/newc', [UsuarioController::class, 'newc'])->name('c.new');

//Editar//
Route::get('/dashboard/usuarios/edit/{persona_id}', [UsuarioController::class, 'editUser'])->name('u.edit');
/* Route::put('/dashboard/usuarios/updateUser/{persona_id}',function(Request $request){
    UsuarioController::updateUser($persona_id,$request);
})->name('u.update'); */
Route::put('/dashboard/usuarios/updateUser/{persona_id}',[UsuarioController::class,'updateUser'])->name('u.update');
/* Route::put('/dashboard/usuarios/updateUser/{persona_id}', [UsuarioController::class, 'updateUser'])->name('u.update'); */


Route::get('/ecomerce', function () {
    return view('ecomerce');
});

Route::get('estadoPersona','UsuarioController@uptadeEstadoUs')->name('uptadeEstadoUs');