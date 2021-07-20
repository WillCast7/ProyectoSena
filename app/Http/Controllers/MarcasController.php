<?php

namespace App\Http\Controllers;

use App\Models\marcas;
use Illuminate\Http\Request;

class MarcasController extends Controller{
    public function getMarcas(){
        $marcas=marcas::getMarcasSQL();
        return view('marcasDashboard', compact('marcas'));
     }
    public function newMarca(Request $request){//Agregar Marca
        $marcas = new marcas();

        $objData=$request->all();

        $marcas->marca_nombre              =$objData["marca_nombre"];
        $marcas->marca_estado              =1;
        $marcas->save();

        return back();
     }
     public function editMarca($marca_id){
        $marcas=marcas::getMarcaSQL($marca_id);
        /*         $roles=usuario::getRol();
        $tipoDoc=usuario::getTipoDoc();
        $paises=usuario::getCountry();
        $deptos=usuario::getDepartments();
        $city=usuario::getCity(); */
        /* echo"<pre>";print_r($usuario); */
        return view('parametros.marcasEdit', compact('marcas'));
     }

    
}
