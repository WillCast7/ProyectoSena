<?php
namespace App\Http\Controllers;

use App\Models\usuario;
use App\Models\productos;
use App\Models\marcas;
use App\Models\categorias;
use Illuminate\Http\Request;

class ProductosController extends Controller{
    public function getProductos(){//obtiene los productos
        if(session()->get('rol') == 1){
            $productos=productos::getProductosSQL();
            $categorias=categorias::getFormCategoriasSQL();
            $marcas=marcas::getFormMarcasSQL();
            return view('productosDashboard', compact('productos', 'categorias', 'marcas'));
        }else{
            return redirect()->route('ecommerce');
        }
     }
    public function getFormProductos(){//obtiene los productos activos
        $productos=productos::getFormProductosSQL();
        $categorias=categorias::getFormCategoriasSQL();
        $marcas=marcas::getFormMarcasSQL();
        return view('productosDashboard', compact('productos', 'categorias', 'marcas'));

     }
    public function editProducto($producto_id){
        $productos=productos::getProductoSQL($producto_id);
        $categorias=categorias::getFormCategoriasSQL();
        $marcas=marcas::getFormMarcasSQL();
        return view('parametros.productosEdit', compact('productos', 'categorias', 'marcas'));
        }
    public static function updateProducto(Request $request,$producto_id){
            productos::updateProductoSQL($request, $producto_id);
             return redirect('/dashboard/productos');
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
    public function deleteProducto($producto_id){
        productos::deleteProductoSQL($producto_id);
        return back();
        }

    public static function undeleteProducto($producto_id){
        productos::undeleteProductoSQL($producto_id);
        return back();
        }
    public static function AdminImagenes(){
        echo"hi";
        }
}
//local storage
//JSON
