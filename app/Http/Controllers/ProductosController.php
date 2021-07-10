<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productos;

class ProductosController extends Controller
{
    public function new(Request $request){

        $productos = new productos();


        $objData=$request->all();

        $productos->producto_nombre=$objData["producto_nombre"];
        $productos->producto_cantidad=$objData["producto_cantidad"];
        $productos->producto_descripcion=$objData["producto_descripcion"];
        $productos->producto_empresa=$objData["producto_empresa"];
        $productos->save();





       $productos=$productos->getUsuarios();
       return view('usuariosDashboard', compact('usuarios'));

        exit();



        $productos->usuario_username      = $request->usuario_username ;



        $usuario=productos::all();
        return view('usuariosDashboard', compact('usuario'));

    }
}
