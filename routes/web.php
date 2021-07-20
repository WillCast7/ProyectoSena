<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\MarcasController;
use App\Http\Controllers\CategoriasController;
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
//Vistas principales
Route::get('/dashboard/usuarios',   [UsuarioController::class, 'getUsuarios'     ]);
Route::get('/dashboard/productos',  [ProductosController::class, 'getProductos'  ]);
Route::get('/dashboard/marcas',     [MarcasController::class, 'getMarcas'        ]);
Route::get('/dashboard/categorias', [CategoriasController::class, 'getCategorias']);


//login
Route::post('/auth', [AuthController::class, 'auth'])->name('auth');

//Crear
Route::get('/dashboard/usuarios/create/newUser',        [UsuarioController::class, 'newUser'        ])->name('a.new');
Route::get('/dashboard/usuarios/create/newProducto',    [ProductosController::class, 'newProducto'  ])->name('p.new');
Route::get('/dashboard/usuarios/create/newMarca',       [MarcasController::class, 'newMarca'        ])->name('m.new');
Route::get('/dashboard/usuarios/create/newCategoria',   [CategoriasController::class, 'newCategoria'])->name('c.new');

//Editar//
Route::get('/dashboard/usuarios/edit/{persona_id}', [UsuarioController::class, 'editUser'])->name('u.edit');
Route::get('/dashboard/productos/edit/{producto_id}', [ProductosController::class, 'editProducto'])->name('p.edit');
Route::get('/dashboard/categorias/edit/{categoria_id}', [CategoriasController::class, 'editCategoria'])->name('c.edit');
Route::get('/dashboard/marcas/edit/{marca_id}', [MarcasController::class, 'editMarca'])->name('m.edit');
/* Route::put('/dashboard/usuarios/updateUser/{persona_id}',function(Request $request){
    UsuarioController::updateUser($persona_id,$request);
})->name('u.update'); */
Route::put('/dashboard/usuarios/updateUser/{persona_id}',[UsuarioController::class,'updateUser'])->name('u.update');
/* Route::put('/dashboard/usuarios/updateUser/{persona_id}', [UsuarioController::class, 'updateUser'])->name('u.update'); */


Route::get('/ecomerce', function () {
    return view('ecomerce');
});

/* Route::put('/dashboard/usuarios/deleteUser/{persona_id}',[UsuarioController::class,'deleteUser'])->name('u.update'); */
/* Route::get('estadoPersona','UsuarioController@uptadeEstadoUs')->name('uptadeEstadoUs'); */
