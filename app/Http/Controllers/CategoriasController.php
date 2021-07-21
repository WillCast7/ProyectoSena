<?php

namespace App\Http\Controllers;

use App\Models\usuario;
use App\Models\productos;
use App\Models\marcas;
use App\Models\categorias;
use Illuminate\Http\Request;

class CategoriasController extends Controller{
    public function getCategorias(){//Trae las categorias
        if(session()->get('rol') == 1){
            $categorias=categorias::getCategoriasSQL();
            return view('categoriasDashboard', compact('categorias'));
        }else{
            return redirect()->route('ecommerce');
        }
     }
    public function getFormCategorias(){//Trae las categorias Activas
        $categorias=categorias::getFormCategoriasSQL();
        return view('categoriasDashboard', compact('categorias'));
        }

    public function editCategoria($categoria_id){
            $categorias=categorias::getcategoriaSQL($categoria_id);
            $cate=categorias::getFormcategoriasSQL();
            return view('parametros.categoriasEdit', compact('categorias', 'cate'));
        }

    public static function updateCategoria(Request $request,$categoria_id){
        if(session()->get('rol') == 1){
            categorias::updateCategoriaSQL($request, $categoria_id);
            return redirect('/dashboard/categorias');
        }else{
            return redirect()->route('ecommerce');
        }
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

    public function deleteCategoria($categoria_id){
        categorias::deleteCategoriaSQL($categoria_id);
        return back();
        }

    public static function undeleteCategoria($categoria_id){
        categorias::undeleteCategoriaSQL($categoria_id);
        return back();
        }
}
