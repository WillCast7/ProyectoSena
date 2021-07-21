<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\GeneralController;

class CheckoutController extends Controller{
    

    public function oneStep(){
        // consultar departamentos
        $departments = GeneralController::getDepartments();
        $data = [];
        $data['departamentos'] = $departments;

        print_r($data);
        
        return view('theme-ecommerce.checkout',$data);
    }

}
