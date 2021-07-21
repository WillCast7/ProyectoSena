<?php

namespace App\Http\Controllers;

use App\Models\marcas;
use Illuminate\Http\Request;

class MarcasController extends Controller{
    public function getMarcas(){
        if(session()->get('rol') == 1){
            $marcas=marcas::getMarcasSQL();
            return view('marcasDashboard', compact('marcas'));
        }else{
            return redirect()->route('ecommerce');
        }
     }
    public function newMarca(Request $request){//Agregar Marca
        $marcas = new marcas();

        $objData=$request->all();
        //echo"<pre>"; print_r($objData);
        $marcas->marca_nombre              =$objData["marca_nombre"];
        $marcas->marca_imagen              =$objData["marca_imagen"];
        $marcas->marca_estado              =1;
        $marcas->save();

        return back();
     }
    public function editMarca($marca_id){
        $marcas=marcas::getMarcaSQL($marca_id);
        return view('parametros.marcasEdit', compact('marcas'));

     }

     public function updateMarca(Request $request,$marca_id){
      $objData=$request->all();
      marcas::updateMarcaSQL($request, $marca_id);
       return redirect('/dashboard/marcas');


     }



    public function deleteMarca($marca_id){
        marcas::deleteMarcaSQL($marca_id);
        return back();
        }

    public static function undeleteMarca($marca_id){
        marcas::undeleteMarcaSQL($marca_id);
        return back();
        }

}
