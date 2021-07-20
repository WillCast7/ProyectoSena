<?php
namespace App\Http\Controllers;

use App\Models\usuario;
use App\Models\productos;
use App\Models\marcas;
use App\Models\categorias;
use Illuminate\Http\Request;

class ProductosController extends Controller{
    public function getProductos(){
        $productos=productos::getProductosSQL();
        $categorias=categorias::getCategoriasSQL();
        $marcas=marcas::getMarcasSQL();
        return view('productosDashboard', compact('productos', 'categorias', 'marcas'));

     }
    public function newProducto(Request $request){//Agregar Producto
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




        return back();
     }
}
