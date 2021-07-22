<?php

namespace App\Http\Controllers\Ecommerce;

use App\Models\Ecommerce\OrderModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller{
    public function getOrder(){
        if(session()->get('rol') == 1){
            $orders=OrderModel::getOrdersSQL();
            return view('ordersDashboard', compact('orders'));
        }else{
            return redirect()->route('ecommerce');
        }
    }
}
