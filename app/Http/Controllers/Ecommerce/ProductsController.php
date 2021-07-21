<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ecommerce\ProductsModel;
use App\Models\Ecommerce\ProductsImageModel;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller{
    

    public function get(){
        // return ProductsModel::all();

        $result = DB::table('productos')
                ->leftJoin('productos_imagenes','productos.producto_id','=','productos_imagenes.producto_id')
                ->where([
                    ['productos_imagenes.imagen_tipo','=','PRODUCTO'],
                    ['productos_imagenes.imagen_estado','=','1'],
                    ['productos.producto_estado','=','1'],
                    ['productos.producto_stock','>','0']
                ])
                ->get();
        return $result;

    }


    public function show($id){
        // echo $id;
        $product = ProductsModel::find($id);
        // images product
        $images = ProductsImageModel::where('producto_id','=',$id)->get();
        // data - view
        $data = [];
        $data['product'] = $product;
        $data['images'] = $images;

        return view('theme-ecommerce.single-product',$data);
    }

    public function getByUrlCategory($url){
        $products = ProductsModel::getByUrlCategory($url);
        return $products;
    }


    public static function getProductById($id){
        $product    = ProductsModel::find($id);
        $images     = ProductsImageModel::where([
                        ['productos_imagenes.imagen_tipo','=','PRODUCTO'],
                        ['producto_id','=',$id]
                    ])->get();

        // $product    = $pro
        $product['images'] = $images;
        // $data = [];
        // $data['product']    = $product;
        // $data['images']     = $images;
        return $product;
    }


}
