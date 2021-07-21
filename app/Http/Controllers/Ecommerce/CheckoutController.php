<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\GeneralController;
use App\http\Controllers\Ecommerce\ProductsController;

class CheckoutController extends Controller{
    

    public function oneStep(Request $request){
        // productos desde url
        $cantidades = $request->input('cantidades');
        $productos  = $request->input('productos');

        $products = [];
        $subtotal = 0;

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
            $total = $subtotal;
        }

        $dataSession = [
            'productos'     => $productos,
            'cantidades'    => $cantidades,
            'subtotal'      => $subtotal,
            'total'         => $total
        ];

        session($dataSession);

        // consultar departamentos
        $departments = GeneralController::getDepartments();
        $data = [];
        $data['departamentos'] = $departments;
        $data['ciudades'] = [];
        $data['subtotal'] = $subtotal;
        $data['total'] = $total;
        return view('theme-ecommerce.checkout',$data);
    }


    public function twoStep(Request $request){
        $objData = $request->all();
        if(!isset($objData['cardnumber'])){
            // retorno vista de tarjeta
            $data = [];
            $data['address']        = $objData['address'];
            $data['firstname']      = $objData['firstname'];
            $data['lastname']       = $objData['lastname'];
            $data['email']          = $objData['email'];
            $data['phone']          = $objData['phone'];
            $data['department']     = $objData['department'];

            $department = GeneralController::getDepartmentById($objData['department']);
            $data['department_name'] = $department[0]->nombre;

            $data['city']           = $objData['city'];
            $city = GeneralController::getCityById($objData['city']);
            $data['city_name']      = $city[0]->nombre;

            $data['zipcode']        = $objData['zipcode'];
            $data['total']          = session('total');
            $data['subtotal']       = session('subtotal');

            return view('theme-ecommerce.checkout2',$data);
        }else{
            // retorno confirmacion para pago
        }
        // print_r($objData);
    }

}
