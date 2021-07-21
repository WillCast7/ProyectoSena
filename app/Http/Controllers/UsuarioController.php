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


    public function newUser(Request $request){//Agregar Usuario-Persona


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
