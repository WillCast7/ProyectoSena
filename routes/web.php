<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\Ecommerce\ShopController;
use App\Http\Controllers\Ecommerce\ProductsController;
use App\Http\Controllers\Ecommerce\CategoriesController;
use App\Http\Controllers\Ecommerce\AuthenticationController;
use App\Http\Controllers\Ecommerce\CartController;
use App\Http\Controllers\Ecommerce\CheckoutController;
use App\Http\Controllers\GeneralController;

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


Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/dashboard/usuarios', function () {
    return view('usuariosDashboard');
});

Route::get('/ecommerce', function () {
    return view('ecommerce');
});


/* Daniel Bolivar - routes */
/* 
laravel 7.x 
Route::get('productos','ProductosController@getProducts'); 
laravel 8.x
Route::get('productos', [ProductosController::class,'getProducts']);
*/
Route::get('productos', [ProductosController::class,'getProducts']);
Route::get('shop', [ShopController::class,'getShop']);
Route::get('products/{id}', [ProductsController::class,'show']);
Route::get('categorias/{categoria}',[CategoriesController::class,'shopCategories']);
Route::get('categorias/{categoria}/{subcategoria}',[CategoriesController::class,'shopCategories']);
Route::get('cart',[CartController::class,'getCart']);
Route::get('checkout',[CheckoutController::class,'oneStep']);


Route::get('/',function(){ return view('home');})->name("ecommerce");
Route::post('/auth',[AuthenticationController::class,'login'])->name("auth.login");
Route::get('/auth',[AuthenticationController::class,'logout'])->name("auth.logout");

Route::get('/general',[GeneralController::class,'getParams']);

