<?php

namespace App\Http\Controllers;

use App\Models\ProductosImagenes;
use Illuminate\Http\Request;

class ProductosImagenesController extends Controller{


    public function newImage(Request $request, $producto_id){
        $ProductosImagenes = new ProductosImagenes();
        //$request->validate([])

        if ($request->hasFile("imagen_url")){//si el atributo "imagen_url" tiene un archivo...
            $file=$request->file("imagen_url");//asigna el archivo a la variable file
            $nombreArchivo=$file->getClientOriginalName();//obtiene el nombre original de la imagen
            $file->move(public_path("resourcesEcommerce/products/"),$nombreArchivo);//lo mueve a la locacion el archivo "$nombreArchivo"
            $ProductosImagenes->imagen_nombre=$request->imagen_nombre;
            $ProductosImagenes->producto_id=$request->producto_id;
            $ProductosImagenes->imagen_url="/resourcesEcommerce/products/".$nombreArchivo;
            $ProductosImagenes->$producto_id;
            $ProductosImagenes->imagen_alt=$nombreArchivo;
            $ProductosImagenes->imagen_title=$request->imagen_title;
            $ProductosImagenes->imagen_creadopor=1;
            $ProductosImagenes->save();
            return back();
        }else{echo "Error no imagen insertada";}

     }
    public static function AdminImagenes(){
        echo"hi";
     }

    public function  imageProducto($producto_id){//obtiene las imagenes de los productos
        if(session()->get('rol') == 1){
            $imagenProducto=ProductosImagenes:: getImagenesProductoSQL($producto_id);
            return view('parametros.productosImagenes', compact('imagenProducto', 'producto_id'));
        }else{
            return redirect()->route('ecommerce');
         }
     }

    public function deleteImagen($producto_id){
        ProductosImagenes::deleteImagenSQL($producto_id);
        return back();
        }

    public static function undeleteImagen($producto_id){
        ProductosImagenes::undeleteImagenSQL($producto_id);
        return back();
        }
}
