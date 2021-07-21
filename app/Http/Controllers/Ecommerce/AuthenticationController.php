<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

class AuthenticationController extends Controller{
    

    protected function login(Request $request){
        // return $request->all();
        $username = $request->input('username');
        $password = $request->input('password');
        $password = Crypt::encrypt($password);

        // consulta de usuarios
        
        // $password = Crypt::decrypt($password);
        $logged = true;
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
        }
    }

    protected function logout(){
        session()->flush();
        return redirect()->route('ecommerce');
    }


}
