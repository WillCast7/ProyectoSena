<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GeneralModel extends Model{
    use HasFactory;


    public static function getDepartments($country = 'CO'){
        $sql = "SELECT 
                    departamento_codigo as codigo,
                    departamento_nombre as nombre
                from departamentos where pais_codigo = ?";
        $result = DB::select($sql,array($country));
        return $result;
    }


    public  static function getCities($department,$country='CO'){
        $sql = "SELECT 
                    ciudad_codigo as codigo,
                    ciudad_nombre as nombre
                from 
                    ciudades
                where 
                    pais_codigo = ? 
                    and departamento_codigo = ?";
        $result = DB::select($sql,array($county,$department));
        return $result;
    }





}
