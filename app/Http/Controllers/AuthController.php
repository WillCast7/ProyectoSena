<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller{

    public function auth(Request $request){
        return $request->all();
    }
}
