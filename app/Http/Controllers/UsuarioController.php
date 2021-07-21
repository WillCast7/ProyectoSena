<?php

namespace App\Http\Controllers;

use App\Models\usuario;
use App\Models\persona;
use App\Models\productos;
use App\Models\marcas;
use App\Models\categorias;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;


class UsuarioController extends Controller{
    public function getUsuarios(){//obtiene usuarios
        if(session()->get('rol') == 1){
            $usuarios=usuario::getUsuariosSQL();
            $roles=usuario::getRolSQL();
            $tipoDoc=usuario::getTipoDocSQL();
            $paises=usuario::getCountrySQL();
            $deptos=usuario::getDepartmentsSQL();
            $city=usuario::getCitySQL();
            return view('usuariosDashboard', compact('usuarios', 'roles', 'tipoDoc', 'paises', 'deptos', 'city'));
        }else{
            return redirect()->route('ecommerce');
        }
     }
    public function getFormUsuarios(){//obtiene usuarios activos

        $usuarios=usuario::getFormUsuariosSQL();
        $roles=usuario::getRolSQL();
        $tipoDoc=usuario::getTipoDocSQL();
        $paises=usuario::getCountrySQL();
        $deptos=usuario::getDepartmentsSQL();
        $city=usuario::getCitySQL();
        return view('usuariosDashboard', compact('usuarios', 'roles', 'tipoDoc', 'paises', 'deptos', 'city'));

     }


    public function newUser(Request $request){//Agregar Usuario-Persona
/*         $usuario = new usuario(); */
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
        $persona->usuario_username          =$objData["usuario_username"];
        $persona->usuario_pass              =Crypt::encryptString($objData["usuario_pass"]);//para desencriptar Crypt::decryptString()
        $persona->perfil_id                 =$objData["perfil_id"];
        $persona->save();
        $personaId=$persona->persona_id;


/*         $usuario->persona_id                =$personaId;
        $usuario->usuario_estado            =1;
        $usuario->save();
        $usuario_id=$usuario->usuario_id; */

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
        if(session()->get('rol') == 1){
            $usuario=usuario::getUsuarioSQL($persona_id);
            $roles=usuario::getRolSQL();
            $tipoDoc=usuario::getTipoDocSQL();
            $paises=usuario::getCountrySQL();
            $deptos=usuario::getDepartmentsSQL();
            $city=usuario::getCitySQL();
            return view('parametros.usuarioEdit', compact('usuario', 'roles', 'tipoDoc', 'paises', 'deptos', 'city'));
        }else{return redirect()->route('ecommerce');
        }
     }
    public static function updateUser(Request $request,$persona_id){
        usuario::updatePersonSQL($request, $persona_id);
         return redirect('/dashboard/usuarios');
     }

    public function deleteUser($persona_id){
        usuario::deleteUserSQL($persona_id);
        return back();
        }

    public static function undeleteUser($persona_id){
        usuario::undeleteUserSQL($persona_id);
        return back();
        }


         


}
