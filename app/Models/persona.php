<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class persona extends Model{
    use HasFactory;
    protected $table="personas";
    protected $primaryKey="persona_id";
    public $incrementing=true;
    public $timestamps=false;



    public static function insertPersonaSQL($persona){
        $usuario_id=DB::select('
            insert into personas(
                persona_nombre1,
                persona_nombre2,
                persona_apellido1,
                persona_apellido2,
                persona_tipodocumento,
                persona_dni,
                persona_telefono,
                persona_email,
                pais_codigo,
                departamento_codigo,
                ciudad_codigo,
                persona_direccion,
                persona_fnacimiento,
                persona_ciudadmacimiento,
                persona_avatar
            ) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',
            Array(
                $persona['persona_nombre1'],
                $persona['persona_nombre2'],
                $persona['persona_apellido1'],
                $persona['persona_apellido2'],
                $persona['persona_tipodocumento'],
                $persona['persona_dni'],
                $persona['persona_telefono'],
                $persona['persona_email'],
                $persona['pais_codigo'],
                $persona['departamento_codigo'],
                $persona['ciudad_codigo'],
                $persona['persona_direccion'],
                $persona['persona_fnacimiento'],
                $persona['persona_ciudadmacimiento'],
                $persona['persona_avatar']
            ));


        return $usuario_id;
    }
}
