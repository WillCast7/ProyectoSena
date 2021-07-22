<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\GeneralController;
use App\http\Controllers\Ecommerce\ProductsController;
use App\Models\Ecommerce\OrderModel;
use App\Models\Ecommerce\OrderDetailModel;
use App\Models\Ecommerce\PagosModel;


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

                return redirect('checkout/'.$pedido->pedido_id);
                // return view('theme-ecommerce.checkout2',$data);
            }else{ // no hay productos
                return redirect()->route('ecommerce');
            }
        }
    }

    public function threeStep(Request $request,$pedido_id){

        $objData = $request->all();
        if(!isset($objData['cardnumber'])){
            // obtengo pedido
            $pedido = OrderModel::find($pedido_id);

            // retorno vista de tarjeta
            $data = [];
            $data['pedido_id']      = $pedido['pedido_id'];
            $data['address']        = $pedido['pedido_direccion'];
            $data['firstname']      = $pedido['pedido_nombre'];
            $data['lastname']       = $pedido['pedido_apellidos'];
            $data['email']          = $pedido['pedido_email'];
            $data['phone']          = $pedido['pedido_telefono'];
            $data['department']     = $pedido['departamento_codigo'];

            $department = GeneralController::getDepartmentById($pedido['departamento_codigo']);
            $data['department_name'] = $department[0]->nombre;

            $data['city']           = $pedido['ciudad_codigo'];
            $city = GeneralController::getCityById($pedido['ciudad_codigo']);
            $data['city_name']      = $city[0]->nombre;

            $data['zipcode']        = $pedido['pedido_zipcode'];
            $data['subtotal']       = $pedido['pedido_subtotal'];
            $data['impuestos']      = $pedido['pedido_impuestos'];
            $data['total']          = $pedido['pedido_total'];

            return view('theme-ecommerce.checkout2',$data);
        // }elseif(isset($objData['cardnumber'])){
        }else{
            // consultamos el pedido - para obtener el valor a facturar
            $pedido = OrderModel::find($pedido_id);
            // guardamos informacion de pago
            $pago = [];
            $pago['pedido_id']           = $pedido_id;
            $pago['pago_titular']        = $objData['cardholdername'];
            $pago['pago_cardnumber']     = $objData['cardnumber'];
            $pago['pago_expirydate']     = $objData['yearexpired']."/".$objData['monthexpired'];
            $pago['pago_valor']          = $pedido['pedido_total'];
            $pago['pago_securitycode']   = $objData['securitycode'];
            $pago['pago_estado']         = 'PAGO';
            $pago['pago_fcreacion']      = date('Y-m-d h:i:s');

            $pago = PagosModel::create($pago);

            // actualizamos el estado del pedido
            $order = OrderModel::find($pedido_id);
            $order->pedido_estado = 'PAGADO';
            $order->save();

            $data = [];
            $data['pedido_id'] = $pedido_id; 

            return view('theme-ecommerce.thankyou',$data);
            // echo "<pre>";
            // print_r($objData);
        }
    }

}
