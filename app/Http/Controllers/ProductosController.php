<?php
namespace App\Http\Controllers;

use App\Models\usuario;
use App\Models\productos;
use Illuminate\Http\Request;

class ProductosController extends Controller{
    public function listado(){

        $usuarios=usuario::getUsuariosSQL();
        $roles=usuario::getRol();
        $tipoDoc=usuario::getTipoDoc();
        $productos=productos::getProductosSQL();
        $categorias=productos::getCat();
        $marcas=productos::getMarca();
        $paises=usuario::getCountry();
        $deptos=usuario::getDepartments();
        $city=usuario::getCity();
        return view('usuariosDashboard', compact('usuarios', 'roles', 'productos', 'categorias', 'tipoDoc', 'paises', 'deptos', 'city', 'marcas'));

    }
    public function newp(Request $request){
        $productos = new productos();


        $objData=$request->all();

        $productos->producto_nombre              =$objData["producto_nombre"];
        $productos->producto_referencia          =$objData["producto_referencia"];
        $productos->producto_precio              =$objData["producto_precio"];
        $productos->producto_descripcioncorta    =$objData["producto_descripcioncorta"];
        $productos->producto_descripcion         =$objData["producto_descripcion"];
        $productos->producto_stock               =$objData["producto_stock"];
        $productos->categoria_id                 =$objData["categoria_id"];
        $productos->marca_id                     =$objData["marca_id"];
        $productos->save();




        $usuarios=usuario::getUsuariosSQL();
        $roles=usuario::getRol();
        $tipoDoc=usuario::getTipoDoc();
        $productos=productos::getProductosSQL();
        $categorias=productos::getCat();
        $marcas=productos::getMarca();
        $paises=usuario::getCountry();
        $deptos=usuario::getDepartments();
        $city=usuario::getCity();
        return view('usuariosDashboard', compact('usuarios', 'roles', 'productos', 'categorias', 'tipoDoc', 'paises', 'deptos', 'city', 'marcas'));
        exit();
    }
}
