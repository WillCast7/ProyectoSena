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
        return view('parametros.marcasEdit', compact('marcas'));

     }

     public function updateMarca(Request $request,$marca_id){
      $objData=$request->all();
      marcas::updateMarcaSQL($request, $marca_id);
       return redirect('/dashboard/marcas');


     }

    
}
