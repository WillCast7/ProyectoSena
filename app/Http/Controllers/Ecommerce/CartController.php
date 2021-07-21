<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\Ecommerce\ProductsController;

class CartController extends Controller{
    

    public function getCart(Request $request){
        $data = [];
        $products = [];
        $subtotal = 0;

        $cantidades = $request->input('cantidades');
        $productos  = $request->input('productos');
        
        if($cantidades !== null && $productos !== null){
            $productos = json_decode($request->input('productos'));
            $cantidades = json_decode($request->input('cantidades'));

            // obtengo productos
            
            foreach($productos as $key=>$product){
                if($product!= null){
                    $result = ProductsController::getProductById($product);
                    $result['cantidad'] = $cantidades[$key];
                    $subtotal += $result['producto_precio'] * $cantidades[$key];
                    $products[] = $result;
                }
            }
            
        }
        $data['products'] = $products;
        $data['subtotal'] = $subtotal;
        $data['iva'] = 0;
        $data['total'] = $subtotal;
        return view('theme-ecommerce.cart',$data);
        // echo "<pre>";
        // print_r($data);
        // exit();
    }

}
