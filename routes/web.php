<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\Ecommerce\ShopController;
use App\Http\Controllers\Ecommerce\ProductsController;
use App\Http\Controllers\Ecommerce\CategoriesController;
use App\Http\Controllers\Ecommerce\AuthenticationController;
use App\Http\Controllers\Ecommerce\CartController;
use App\Http\Controllers\Ecommerce\CheckoutController;
use App\Http\Controllers\Ecommerce\ProfileController;
use App\Http\Controllers\Ecommerce\OrderController;
use App\Http\Controllers\GeneralController;

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\MarcasController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ProductosImagenesController;

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

// Route::get('/', function () {
//     // return view('welcome');
//     return view('home-ecommerce');
// });

Route::get('/login', function () {
    return view('ecommerce.login');
});

Route::get('/dashboard', [GeneralController::class, 'dashboardIndex']);//indice dashboard

Route::get('/ecommerce', function () {
    return view('ecommerce');
});


/* #################### Daniel Bolivar - routes  ################################## */
/*
laravel 7.x
Route::get('productos','ProductosController@getProducts');
laravel 8.x
Route::get('productos', [ProductosController::class,'getProducts']);
*/
Route::get('productos', [ProductosController::class,'getProducts']);
Route::get('shop', [ShopController::class,'getShop']);
Route::get('profile/{id}',[ProfileController::class,'getProfile']);
Route::get('products/{id}', [ProductsController::class,'show']);
Route::get('categorias/{categoria}',[CategoriesController::class,'shopCategories']);
Route::get('categorias/{categoria}/{subcategoria}',[CategoriesController::class,'shopCategories']);
Route::get('cart',[CartController::class,'getCart']);
Route::get('checkout',[CheckoutController::class,'oneStep']);
// Route::post('checkout',[CheckoutController::class,'twoStep']);
Route::post('checkout',[CheckoutController::class,'twoStep']);
Route::get('checkout/{id}',[CheckoutController::class,'threeStep']);
Route::post('checkout/{id}',[CheckoutController::class,'threeStep']);


Route::get('/',function(){ return view('home');})->name("ecommerce");
Route::post('/auth',[AuthenticationController::class,'login'])->name("auth.login");
Route::get('/auth',[AuthenticationController::class,'logout'])->name("auth.logout");
Route::get('/general',[GeneralController::class,'getParams']);

/* #################### /Daniel Bolivar - routes  ################################## */


//Vistas principales
Route::get('/dashboard/usuarios',   [UsuarioController::class, 'getUsuarios'     ])->name('Usuarios');
Route::get('/dashboard/productos',  [ProductosController::class, 'getProductos'  ])->name('Productos');
Route::get('/dashboard/marcas',     [MarcasController::class, 'getMarcas'        ])->name('Marcas');
Route::get('/dashboard/categorias', [CategoriasController::class, 'getCategorias'])->name('Categorias');
Route::get('/dashboard/ordenes',    [OrderController::class, 'getOrder'          ])->name('Ordenes');

//Borrar(activar/desactivar)
Route::get('/dashboard/usuarios/delete/{persona_id}',      [UsuarioController::class, 'deleteUser'              ])->name('u.delete');
Route::get('/dashboard/usuarios/undelete/{persona_id}',    [UsuarioController::class, 'undeleteUser'            ])->name('u.undelete');

Route::get('/dashboard/productos/delete/{producto_id}',    [ProductosController::class, 'deleteProducto'        ])->name('p.delete');
Route::get('/dashboard/productos/undelete/{producto_id}',  [ProductosController::class, 'undeleteProducto'      ])->name('p.undelete');

Route::get('/dashboard/marcas/delete/{marca_id}',          [MarcasController::class, 'deleteMarca'              ])->name('m.delete');
Route::get('/dashboard/marcas/undelete/{marca_id}',        [MarcasController::class, 'undeleteMarca'            ])->name('m.undelete');

Route::get('/dashboard/categorias/delete/{categoria_id}',  [CategoriasController::class, 'deleteCategoria'      ])->name('c.delete');
Route::get('/dashboard/categorias/undelete/{categoria_id}',[CategoriasController::class, 'undeleteCategoria'    ])->name('c.undelete');

Route::get('/dashboard/imagen/delete/{imagen_id}',         [ProductosImagenesController::class, 'deleteImagen'  ])->name('i.delete');
Route::get('/dashboard/imagen/undelete/{imagen_id}',       [ProductosImagenesController::class, 'undeleteImagen'])->name('i.undelete');


//Crear
Route::post('/dashboard/usuarios/create/newUser',               [UsuarioController::class, 'newUser'           ])->name('a.new');
Route::get('/dashboard/usuarios/create/newProducto',            [ProductosController::class, 'newProducto'     ])->name('p.new');
Route::post('/dashboard/usuarios/create/newImage/{producto_id}',[ProductosImagenesController::class, 'newImage'])->name('i.new');
Route::get('/dashboard/usuarios/create/newMarca',               [MarcasController::class, 'newMarca'           ])->name('m.new');
Route::get('/dashboard/usuarios/create/newCategoria',           [CategoriasController::class, 'newCategoria'   ])->name('c.new');

//vista crear
Route::get('/dashboard/usuarios/create/formUser', [UsuarioController::class, 'formNewUser'])->name('formNewUser');

//Editar
Route::get('/dashboard/usuarios/edit/{persona_id}',     [UsuarioController::class, 'editUser'               ])->name('u.edit');
Route::get('/dashboard/productos/edit/{producto_id}',   [ProductosController::class, 'editProducto'         ])->name('p.edit');
Route::get('/dashboard/productos/image/{producto_id}',  [ProductosImagenesController::class, 'imageProducto'])->name('p.image');
Route::get('/dashboard/categorias/edit/{categoria_id}', [CategoriasController::class, 'editCategoria'       ])->name('c.edit');
Route::get('/dashboard/marcas/edit/{marca_id}',         [MarcasController::class, 'editMarca'               ])->name('m.edit');

//Update
Route::put('/dashboard/usuarios/updateUser/{persona_id}',       [UsuarioController::class,'updateUser'        ])->name('u.update');
Route::put('/dashboard/usuarios/updateProducto/{producto_id}',  [ProductosController::class,'updateProducto'  ])->name('p.update');
Route::put('/dashboard/usuarios/updateMarca/{marca_id}',        [MarcasController::class,'updateMarca'        ])->name('m.update');
Route::put('/dashboard/usuarios/updateCategoria/{categoria_id}',[CategoriasController::class,'updateCategoria'])->name('c.update');

//Revisar... creo que solo es una prueba
Route::get('/dashboard/productos/imagenes',   [ProductosController::class, 'AdminImagenes'])->name('i.admin');
