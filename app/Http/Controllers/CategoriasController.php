<?php

namespace App\Http\Controllers;

use App\Models\usuario;
use App\Models\productos;
use App\Models\marcas;
use App\Models\categorias;
use Illuminate\Http\Request;

class CategoriasController extends Controller{
    public function getCategorias(){
        $categorias=categorias::getCategoriasSQL();
        return view('categoriasDashboard', compact('categorias'));
        }

    public function newCategoria(Request $request){//Agregar categorias
        $categorias = new categorias();

        $objData=$request->all();

        $categorias->categoria_nombre               =$objData["categoria_nombre"];
        $categorias->categoria_padre                =$objData["categoria_padre"];
        $categorias->categoria_url                  =$objData["categoria_url"];
        $categorias->categoria_estado               =1;
        $categorias->save();

        return back();
     }
}
