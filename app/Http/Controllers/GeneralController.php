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
                return $this->returnData($cities);
            break;
            default:
            break;
        }
    }

    public  function dashboardIndex(){//Index dashboard
        if(session()->get('rol') == 1){
            return view('dashboard');
        }else{
            return redirect()->route('ecommerce');
        }
    }

    public function returnData($data,$msg='Se produjo un error'){
        if(sizeof($data) > 0){
            $data = array(
                'success'=> true,
                'data'  => $data
            );
        }else{
            $data = array(
                'success'=> false,
                'message'=> $msg
            );
        }
        return json_encode($data);
    }


    public static function getDepartments($country='CO'){
        $departments = GeneralModel::getDepartments($country);
        return $departments;
    }

    public static function getDepartmentById($department){
        $department = GeneralModel::getDepartmentById($department);
        return $department;
    }
    public static function getCityById($city){
        $department = GeneralModel::getCityById($city);
        return $department;
    }


}
