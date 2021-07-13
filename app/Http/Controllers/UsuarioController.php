<?php

namespace App\Http\Controllers;

use App\Models\usuario;
use App\Models\persona;
use App\Models\perfilPersona;
use App\Models\productos;
use Illuminate\Http\Request;


class UsuarioController extends Controller{
    public function listado(){

        $usuarios=usuario::getUsuariosSQL();
        $roles=usuario::getRol();
        $tipoDoc=usuario::getTipoDoc();
        $productos=productos::getProductosSQL();
        $categorias=productos::getCat();
        $paises=usuario::getCountry();
        $deptos=usuario::getDepartments();
        $city=usuario::getCity();
        return view('usuariosDashboard', compact('usuarios', 'roles', 'productos', 'categorias', 'tipoDoc', 'paises', 'deptos', 'city'));

    }

    public function create(){
        return view('create.usuarios');
    }


    public function new(Request $request){
        $usuario = new usuario();
        $persona = new persona();
        $perfilPersona = new perfilPersona();
        $objData=$request->all();

        $persona->persona_nombre1          =$objData["persona_nombre1"];
        $persona->persona_nombre2          =$objData["persona_nombre2"];
        $persona->persona_apellido1        =$objData["persona_apellido1"];
        $persona->persona_apellido2        =$objData["persona_apellido2"];
        $persona->persona_tipodocumento    =$objData["persona_tipodocumento"];
        $persona->persona_dni              =$objData["persona_dni"];
        $persona->persona_telefono         =$objData["persona_telefono"];
        $persona->persona_email            =$objData["persona_email"];
        $persona->pais_codigo              =$objData["pais_codigo"];
        $persona->departamento_codigo      =$objData["departamento_codigo"];
        $persona->ciudad_codigo            =$objData["ciudad_codigo"];
        $persona->persona_direccion        =$objData["persona_direccion"];
        $persona->persona_fnacimiento      =$objData["persona_fnacimiento"];
        $persona->persona_ciudadnacimiento =$objData["persona_ciudadnacimiento"];
        $persona->persona_avatar           =$objData["persona_avatar"];
        $persona->persona_estado           =1;
        $persona->persona_creadopor        =1;
        //$persona->persona_fcreacion        =$objData["persona_fcreacion"];
        $persona->save();
        $personaId=$persona->persona_id;


        $usuario->usuario_username          =$objData["usuario_username"];
        $usuario->usuario_pass              =$objData["usuario_pass"];
        $usuario->perfil_id                 =$objData["perfil_id"];
        $usuario->persona_id                =$personaId;
        $usuario->usuario_estado            =1;
        //$usuario->estado=$objData["usuario_fcreacion"];
        $usuario->save();
        $usuario_id=$usuario->usuario_id;

        $usuarios=usuario::getUsuariosSQL();
        $roles=usuario::getRol();
        $tipoDoc=usuario::getTipoDoc();
        $productos=productos::getProductosSQL();
        $categorias=productos::getCat();
        $paises=usuario::getCountry();
        $deptos=usuario::getDepartments();
        $city=usuario::getCity();
        return view('usuariosDashboard', compact('usuarios', 'roles', 'productos', 'categorias', 'tipoDoc', 'paises', 'deptos', 'city'));

        exit();



        $usuario->usuario_username      = $request->usuario_username ;



        $usuario=usuario::all();
        return view('usuariosDashboard', compact('usuario'));

    }


}
