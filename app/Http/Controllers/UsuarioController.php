<?php

namespace App\Http\Controllers;

use App\Models\usuario;
use App\Models\persona;
use App\Models\productos;
use App\Models\marcas;
use App\Models\categorias;

use Illuminate\Http\Request;


class UsuarioController extends Controller{
    public function listado(){

        $usuarios=usuario::getUsuariosSQL();
        $roles=usuario::getRol();
        $tipoDoc=usuario::getTipoDoc();
        $productos=productos::getProductosSQL();
        $categorias=productos::getCat();
        $marcas=productos::getMarca();
        $paises=usuario::getCountry();
        $deptos=usuario::getDepartments();
        $city=usuario::getCity();
        return view('usuariosDashboard', compact('usuarios', 'roles', 'productos', 'categorias', 'tipoDoc', 'paises', 'deptos', 'city', 'marcas'));

     }


    public function new(Request $request){//Agregar Usuario-Persona
        $usuario = new usuario();
        $persona = new persona();
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
        $persona->save();
        $personaId=$persona->persona_id;


        $usuario->usuario_username          =$objData["usuario_username"];
        $usuario->usuario_pass              =$objData["usuario_pass"];
        $usuario->perfil_id                 =$objData["perfil_id"];
        $usuario->persona_id                =$personaId;
        $usuario->usuario_estado            =1;
        $usuario->save();
        $usuario_id=$usuario->usuario_id;

        $usuarios=usuario::getUsuariosSQL();
        $roles=usuario::getRol();
        $tipoDoc=usuario::getTipoDoc();
        $productos=productos::getProductosSQL();
        $categorias=productos::getCat();
        $marcas=productos::getMarca();
        $paises=usuario::getCountry();
        $deptos=usuario::getDepartments();
        $city=usuario::getCity();
        return view('usuariosDashboard', compact('usuarios', 'roles', 'productos', 'categorias', 'tipoDoc', 'paises', 'deptos', 'city', 'marcas'));

        exit();

     }

    public function newp(Request $request){//Agregar Producto
        $productos = new productos();


        $objData=$request->all();

        $productos->producto_nombre              =$objData["producto_nombre"];
        $productos->producto_referencia          =$objData["producto_referencia"];
        $productos->producto_precio              =$objData["producto_precio"];
        $productos->producto_descripcioncorta    =$objData["producto_descripcioncorta"];
        $productos->producto_descripcion         =$objData["producto_descripcion"];
        $productos->producto_stock               =$objData["producto_stock"];
        $productos->categoria_id                 =$objData["categoria_id"];
        $productos->marca_id                     =$objData["marca_id"];
        $productos->save();




        $usuarios=usuario::getUsuariosSQL();
        $roles=usuario::getRol();
        $tipoDoc=usuario::getTipoDoc();
        $productos=productos::getProductosSQL();
        $categorias=productos::getCat();
        $marcas=productos::getMarca();
        $paises=usuario::getCountry();
        $deptos=usuario::getDepartments();
        $city=usuario::getCity();
        return view('usuariosDashboard', compact('usuarios', 'roles', 'productos', 'categorias', 'tipoDoc', 'paises', 'deptos', 'city', 'marcas'));
        exit();
     }

    public function newm(Request $request){//Agregar Marca
        $marcas = new marcas();


        $objData=$request->all();

        $marcas->marca_nombre              =$objData["marca_nombre"];
        $marcas->marca_estado              =1;
        $marcas->save();




        $usuarios=usuario::getUsuariosSQL();
        $roles=usuario::getRol();
        $tipoDoc=usuario::getTipoDoc();
        $productos=productos::getProductosSQL();
        $categorias=productos::getCat();
        $marcas=productos::getMarca();
        $paises=usuario::getCountry();
        $deptos=usuario::getDepartments();
        $city=usuario::getCity();
        return view('usuariosDashboard', compact('usuarios', 'roles', 'productos', 'categorias', 'tipoDoc', 'paises', 'deptos', 'city', 'marcas'));
        exit();
     }

    public function newc(Request $request){//Agregar categorias
        $categorias = new categorias();

        $objData=$request->all();

        $categorias->categoria_nombre               =$objData["categoria_nombre"];
        $categorias->categoria_padre                =$objData["categoria_padre"];
        $categorias->categoria_url                  =$objData["categoria_url"];
        $categorias->categoria_estado               =1;
        $categorias->save();




        $usuarios=usuario::getUsuariosSQL();
        $roles=usuario::getRol();
        $tipoDoc=usuario::getTipoDoc();
        $productos=productos::getProductosSQL();
        $categorias=productos::getCat();
        $marcas=productos::getMarca();
        $paises=usuario::getCountry();
        $deptos=usuario::getDepartments();
        $city=usuario::getCity();
        return view('usuariosDashboard', compact('usuarios', 'roles', 'productos', 'categorias', 'tipoDoc', 'paises', 'deptos', 'city', 'marcas'));
        exit();
     }


    public function deleteu(Request $request){
        $objData=$request->all();
     }
    public function auth(Request $request){
        $objData=$request->all();
        return $objData;
     }
    public function editUser($persona_id){
        $usuario=usuario::getUsuario($persona_id);
/*         $roles=usuario::getRol();
        $tipoDoc=usuario::getTipoDoc();
        $paises=usuario::getCountry();
        $deptos=usuario::getDepartments();
        $city=usuario::getCity(); */
        /* echo"<pre>";print_r($usuario); */
        return view('parametros.usuarioEdit', compact('usuario'));
     }
     public static function updateUser(Request $request,$persona_id){
        $objData=$request->all();
        $objData1=$objData;
        usuario::updatePerson($objData);
        usuario::updateUser($objData1);
        return view();
    }

    public function updateUser2(Request $request,$persona_id){
        echo "<pre>";
        print_r($request->all());
        echo $persona_id;
    }

    /* public function updateUser(Request $request,usuario $usuario, persona $persona){
        $persona->persona_nombre1           = $request->persona_nombre1;
        $persona->persona_nombre2           = $request->persona_nombre2;
        $persona->persona_apellido1         = $request->persona_apellido1;
        $persona->persona_apellido2         = $request->persona_apellido2;
        $persona->persona_tipodocumento     = $request->persona_tipodocumento;
        $persona->persona_dni               = $request->persona_dni;
        $persona->persona_telefono          = $request->persona_telefono;
        $persona->persona_fnacimiento       = $request->persona_fnacimiento;
        $persona->persona_ciudadnacimiento  = $request->persona_ciudadnacimiento;
        $persona->pais_codigo               = $request->pais_codigo;
        $persona->departamento_codigo       = $request->departamento_codigo;
        $persona->ciudad_codigo             = $request->ciudad_codigo;
        $persona->persona_direccion         = $request->persona_direccion;

        $persona-> save();

        $usuario->usuario_username      = $request->usuario_username;
        $usuario->usuario_pass          = $request->usuario_pass;
        $usuario->perfil_id             = $request->perfil_id;
        $usuario-> save();
    } */
}
