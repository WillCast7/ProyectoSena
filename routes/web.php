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
Route::get('/dashboard/usuarios',   [UsuarioController::class, 'getUsuarios'     ])->name('Usuarios');
Route::get('/dashboard/productos',  [ProductosController::class, 'getProductos'  ])->name('Productos');
Route::get('/dashboard/marcas',     [MarcasController::class, 'getMarcas'        ])->name('Marcas');
Route::get('/dashboard/categorias', [CategoriasController::class, 'getCategorias'])->name('Categorias');

//Borrar(activar/desactivar)
Route::get('/dashboard/usuarios/delete/{persona_id}',       [UsuarioController::class, 'deleteUser'          ])->name('u.delete');
Route::get('/dashboard/usuarios/undelete/{persona_id}',     [UsuarioController::class, 'undeleteUser'        ])->name('u.undelete');

Route::get('/dashboard/productos/delete/{producto_id}',     [ProductosController::class, 'deleteProducto'    ])->name('p.delete');
Route::get('/dashboard/productos/undelete/{producto_id}',   [ProductosController::class, 'undeleteProducto'  ])->name('p.undelete');

Route::get('/dashboard/marcas/delete/{marca_id}',           [MarcasController::class, 'deleteMarca'          ])->name('m.delete');
Route::get('/dashboard/marcas/undelete/{marca_id}',         [MarcasController::class, 'undeleteMarca'        ])->name('m.undelete');

Route::get('/dashboard/categorias/delete/{categoria_id}',   [CategoriasController::class, 'deleteCategoria'  ])->name('c.delete');
Route::get('/dashboard/categorias/undelete/{categoria_id}', [CategoriasController::class, 'undeleteCategoria'])->name('c.undelete');

//login
Route::post('/auth', [AuthController::class, 'auth'])->name('auth');

//Crear
Route::get('/dashboard/usuarios/create/newUser',        [UsuarioController::class, 'newUser'        ])->name('a.new');
Route::get('/dashboard/usuarios/create/newProducto',    [ProductosController::class, 'newProducto'  ])->name('p.new');
Route::get('/dashboard/usuarios/create/newMarca',       [MarcasController::class, 'newMarca'        ])->name('m.new');
Route::get('/dashboard/usuarios/create/newCategoria',   [CategoriasController::class, 'newCategoria'])->name('c.new');

//Editar//
Route::get('/dashboard/usuarios/edit/{persona_id}',     [UsuarioController::class, 'editUser'        ])->name('u.edit');
Route::get('/dashboard/productos/edit/{producto_id}',   [ProductosController::class, 'editProducto'  ])->name('p.edit');
Route::get('/dashboard/categorias/edit/{categoria_id}', [CategoriasController::class, 'editCategoria'])->name('c.edit');
Route::get('/dashboard/marcas/edit/{marca_id}',         [MarcasController::class, 'editMarca'        ])->name('m.edit');

//Update
Route::put('/dashboard/usuarios/updateUser/{persona_id}',       [UsuarioController::class,'updateUser'        ])->name('u.update');
Route::put('/dashboard/usuarios/updateProducto/{producto_id}',  [ProductosController::class,'updateProducto'  ])->name('p.update');
Route::put('/dashboard/usuarios/updateMarca/{marca_id}',        [MarcasController::class,'updateMarca'        ])->name('m.update');
Route::put('/dashboard/usuarios/updateCategoria/{categoria_id}',[CategoriasController::class,'updateCategoria'])->name('c.update');



Route::get('/ecomerce', function () {
    return view('ecomerce');
});
