<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GeneralModel;

class GeneralController extends Controller{
    

    public function getParams(Request $request){
        switch($request->input('action')){
            case 'getDepartments':
                $departments = $this->getDepartments();
                return $departments;
            break;
            case 'getCity':
                $department = $request->input('departamento');
                $cities = GeneralModel::getCities($department);
                return $cities;
            break;
            default:
            break;
        }
    }


    public function returnData($data){

    }


    public static function getDepartments($country='CO'){
        $departments = GeneralModel::getDepartments($country);
        return $departments;
    }


}
