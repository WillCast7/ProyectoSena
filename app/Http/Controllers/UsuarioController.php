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
        if(session()->get('rol') != null && session()->get('rol') !=4 ){
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
    public function formNewUser(){//obtiene usuarios activos

        $usuarios=usuario::getFormUsuariosSQL();
        $roles=usuario::getRolSQL();
        $tipoDoc=usuario::getTipoDocSQL();
        $paises=usuario::getCountrySQL();
        $deptos=usuario::getDepartmentsSQL();
        $city=usuario::getCitySQL();
        return view('parametros.usuarioCreate', compact('usuarios', 'roles', 'tipoDoc', 'paises', 'deptos', 'city'));

     }


    public function newUser(Request $request){//Agregar Usuario-Persona
        $request->validate([
            'persona_nombre1'=>'required',
            'persona_apellido1'=>'required',
            'persona_tipodocumento'=>'required',
            'persona_dni'=>'required',
            'persona_telefono'=>'required',
            'persona_email'=>'required',
            'pais_codigo'=>'required',
            'departamento_codigo'=>'required',
            'ciudad_codigo'=>'required',
            'persona_fnacimiento'=>'required',
            'persona_ciudadnacimiento'=>'required',
            'persona_avatar'=>'required',
            'usuario_pass'=>'required',
            'perfil_id'=>'required'
        ]);
        $persona = new persona();
        $objData=$request->all();

        if($request->hasFile("persona_avatar")){
            $file=$request->file("persona_avatar");
            $nombreArchivo=$file->getClientOriginalName();
            $file->move(public_path("resourcesEcommerce/avatars/"),$nombreArchivo);
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
            $persona->persona_avatar           ="resourcesEcommerce/avatars/".$nombreArchivo;
            $persona->persona_estado           =1;
            $persona->persona_creadopor        =1;
            $persona->usuario_username          =$objData["persona_email"];
            $persona->usuario_pass              =Crypt::encryptString($objData["usuario_pass"]);//para desencriptar Crypt::decryptString()
            $persona->perfil_id                 =$objData["perfil_id"];
            $persona->save();
            return back();

     }else{echo "Error no imagen insertada";}
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
        }else{
            return redirect()->route('ecommerce');
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
