<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\GeneralController;
use App\http\Controllers\Ecommerce\ProductsController;
use App\Models\Ecommerce\OrderModel;
use App\Models\Ecommerce\OrderDetailModel;

class CheckoutController extends Controller{
    

    public function oneStep(Request $request){
        // productos desde url
        $cantidades = $request->input('cantidades');
        $productos  = $request->input('productos');

        $products = [];
        $subtotal = 0;
        $msg = "";

        if($cantidades !== null && $productos !== null){
            $productos = json_decode($request->input('productos'));
            $cantidades = json_decode($request->input('cantidades'));
            // obtengo productos
            foreach($productos as $key=>$product){
                if($product!= null){
                    $result = ProductsController::getProductById($product);
                    if($result['producto_stock'] >= $cantidades[$key]){
                        $result['cantidad'] = $cantidades[$key];
                        $subtotal += $result['producto_precio'] * $cantidades[$key];
                    }else{ // no hay stock suficiente.
                        $msg = "No hay productos suficientes del artículo: ".$result['producto_nombre']." solo hay ".$result['producto_stock']." disponibles";
                        $subtotal += $result['producto_precio'] * $result['producto_stock'];
                        $cantidades[$key] = $result['producto_stock'];
                    }
                    $products[] = $result;
                }
            }
            $total = $subtotal;
        }

        $dataSession = [
            'productos'     => $productos,
            'cantidades'    => $cantidades,
            'subtotal'      => $subtotal,
            'impuestos'     => 0,
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
        $data['msg'] = $msg;
        return view('theme-ecommerce.checkout',$data);
    }


    public function twoStep(Request $request){
        $objData = $request->all();
        if(!isset($objData['cardnumber'])){
            // echo "<pre>";
            $productos = session('productos');
            $cantidades = session('cantidades');

            if(sizeof($productos)>0){
                // creo pedido
                $pedido = [];
                $pedido['persona_id']               = session('persona_id');
                $pedido['pedido_nombre']            = $objData['firstname'];
                $pedido['pedido_apellidos']         = $objData['lastname'];
                $pedido['pedido_telefono']          = $objData['phone'];
                $pedido['pedido_email']             = $objData['email'];
                $pedido['departamento_codigo']      = $objData['department'];
                $pedido['ciudad_codigo']            = $objData['city'];
                $pedido['pedido_direccion']         = $objData['address'];
                $pedido['pedido_zipcode']           = $objData['zipcode'];
                $pedido['pedido_subtotal']          = session()->get('subtotal');
                $pedido['pedido_impuestos']         = session()->get('impuestos');
                $pedido['pedido_total']             = session()->get('total');
                $pedido['pedido_estado']            = 'PENDIENTE';
                $pedido['pedido_creadopor']         = 1;
                $pedido['pedido_fcreacion']         = Date('Y-m-d h:i:s');
                $pedido['pedido_actualizadopor']    = null;
                $pedido['pedido_factualizacion']    = null;

                $pedido = OrderModel::create($pedido);
                // recorro productos
                foreach($productos as $key => $producto){
                    // obtengo el producto
                    $result = ProductsController::getProductById($producto);
                    // crear detalle de pedido
                    $detallepedido = [];
                    $detallepedido['pedido_id'] = $pedido->pedido_id;
                    $detallepedido['producto_id'] = $result->producto_id;
                    $detallepedido['detallepedido_valorunitario'] = $result['producto_precio'];
                    $detallepedido['detallepedido_cantidad'] = $cantidades[$key];
                    $detallepedido['detallepedido_valortotal'] = $result['producto_precio'] * $cantidades[$key];
                    $detallepedido = OrderDetailModel::create($detallepedido);
                }

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
            }else{ // no hay productos
                return redirect()->route('ecommerce');
            }
        }else{
            // retorno confirmacion para pago
        }
        // print_r($objData);
    }

}
