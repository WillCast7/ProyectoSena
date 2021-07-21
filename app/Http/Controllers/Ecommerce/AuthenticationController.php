<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Models\AuthenticationModel;

class AuthenticationController extends Controller{
    

    protected function login(Request $request){
        // return $request->all();
        $username = $request->input('username');
        $password = $request->input('password');
        // $password = Crypt::encrypt($password);
        // print_r($password);
        // consulta de usuarios
        $user = AuthenticationModel::getUser($username);

        if(sizeof($user)>0){
            if(Crypt::decrypt($user[0]->usuario_pass) == $password){
                $logged = true;
                $dataUser = [
                    'username'  => $user[0]->usuario_username,
                    'name'      => $user[0]->persona_nombre1." ".$user[0]->persona_apellido1,
                    'correo'    => $user[0]->persona_email,
                    'rol'       => $user[0]->perfil_id,
                    'auth'      => true
                ];

                session($dataUser);

                switch($dataUser['rol']){
                    case 'cliente':
                        return redirect()->route('ecommerce');
                    break;
                    default:
                        return redirect()->route('ecommerce');
                    break;
                }
            }else{
                return redirect()->route('ecommerce');
            }
        }else{
            return redirect()->route('ecommerce');
        }
        
        // exit(); 
        
        // $password = Crypt::decrypt($password);
        /* $logged = true;
        if($logged){
            $dataUser = [
                'username'  => 'daniel.bolivar.freelance@gmail.com',
                'name'      => 'Daniel Bolivar',
                'correo'    => 'daniel.bolivar.freelance@gmail.com',
                'rol'       => 'cliente',
                'auth'      => true

            ];

            session($dataUser);
            switch($dataUser['rol']){
                case 'cliente':
                    return redirect()->route('ecommerce');
                break;
                default:
                    return redirect()->route('ecommerce');
                break;
            }
        } */
    }

    protected function logout(){
        session()->flush();
        return redirect()->route('ecommerce');
    }


}
