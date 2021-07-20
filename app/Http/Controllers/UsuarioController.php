<?php

namespace App\Http\Controllers;

use App\Models\usuario;
use App\Models\persona;
use App\Models\productos;
use App\Models\marcas;
use App\Models\categorias;

use Illuminate\Http\Request;


class UsuarioController extends Controller{
    public function getUsuarios(){

        $usuarios=usuario::getUsuariosSQL();
        $roles=usuario::getRolSQL();
        $tipoDoc=usuario::getTipoDocSQL();
        $productos=productos::getProductosSQL();
        $categorias=categorias::getCategoriasSQL();
        $marcas=marcas::getMarcasSQL();
        $paises=usuario::getCountrySQL();
        $deptos=usuario::getDepartmentsSQL();
        $city=usuario::getCitySQL();
        return view('usuariosDashboard', compact('usuarios', 'roles', 'productos', 'categorias', 'tipoDoc', 'paises', 'deptos', 'city', 'marcas'));

     }


    public function newUser(Request $request){//Agregar Usuario-Persona
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

        return back();

     }







    public function deleteu(Request $request){
        $objData=$request->all();
     }
    public function auth(Request $request){
        $objData=$request->all();
        return $objData;
     }
    public function editUser($persona_id){
        $usuario=usuario::getUsuarioSQL($persona_id);
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
        usuario::updatePersonSQL($objData);
       /*     usuario::updateUser($objData1); */
        return view();
     }

    public function updateUser2(Request $request,$persona_id){
        echo "<pre>";
        print_r($request->all());
        echo $persona_id;
     }

    public function uptadeEstadoUs(Request $request){
            
            $personaUptade = persona::findOrFail($request->persona_id)->update(['persona_estado' => $request->persona_estado]); 

            if($request->persona_estado == 0)  {
                $newEstado = '<br> <button type="button" class="btn btn-sm btn-danger">Inactiva</button>';
            }else{
                $newEstado ='<br> <button type="button" class="btn btn-sm btn-success">Activa</button>';
            }

            return response()->json(['var'=>''.$newEstado.'']);
            

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
