<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class usuario extends Model
{
    use HasFactory;
    protected $table="usuarios";
    protected $primaryKey="usuario_id";
    public $incrementing=true;
    public $timestamps=false;



    public static function getUsuarios(){ //Joins usuarios y personas


        $usuarios = DB::table('usuario')
        ->join('personas', 'personas.persona_id', '=', 'usuario.persona_id')
        ->select('personas.*', 'usuario_username', 'usuario_id')
        ->get();
        return $usuarios;

     }
    public static function getUsuariosSQL(){ //Obtener usuarios

        $usuarios=DB::select("SELECT (SELECT CONCAT (per.persona_nombre1,' ', per.persona_nombre2,' ', per.persona_apellido1,' ', per.persona_apellido2)) AS nombres,
                                            per.persona_telefono,
                                            usr.usuario_username, usr.usuario_pass, p.perfil_nombre, per.persona_avatar
                                        FROM personas per
                                        INNER JOIN usuarios  usr
                                            ON per.persona_id=usr.persona_id
                                        INNER JOIN perfiles p
                                            ON p.perfil_id=usr.perfil_id");
        return $usuarios;

     }
    /* public static function insertUserSQL($usuario){ //insertar usuario
        $usuario_id=DB::insert('
        insert into usuario(
                usuario_username,
                usuario_pass,
                persona_id,
                usuario_estado,
                usuario_creadopor,
                usuario_fcreacion,
                perfil_id,
            ) values (?, ?, ?, ?, ?, ?, ?)',
            Array($usuario['usuario_username'],
                $usuario['usuario_pass'],
                $usuario['persona_id'],
                $usuario['usuario_estado'],
                $usuario['usuario_creadopor'],
                $usuario['usuario_fcreacion'],
                $usuario['perfil_id']
            ));

                return $usuario_id;
        } */


    public static function getRol(){ //Obtener roles
        $roles=DB::select("SELECT perfil_id, perfil_nombre, perfil_descripcion
                    FROM perfiles");
                    return $roles;
        }
    public static function insertPersonaSQL($persona){ //insertar persona
            $usuario_id=DB::select('insert into personas(
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
    public static function selectMax(){
        $max=DB::select("SELECT MAX(p.persona_id) FROM personas p");
        return $max;
    }
}
