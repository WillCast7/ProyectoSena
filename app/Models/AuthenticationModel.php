<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AuthenticationModel extends Model{
    use HasFactory;

    public static function getUser($user){
        $sql = "SELECT * from personas where usuario_username = ? -- and persona_estado = 1";
        $result = DB::select($sql,array($user));
        return $result;
    }
}
