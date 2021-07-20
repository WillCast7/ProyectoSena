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


    public static function getUsuariosSQL(){ //Obtener usuarios

        $usuarios=DB::select("SELECT (SELECT CONCAT (per.persona_nombre1,' ', per.persona_nombre2,' ', per.persona_apellido1,' ', per.persona_apellido2)) AS nombres,
                                            per.persona_id,
                                            per.persona_nombre1,
                                            per.persona_nombre2,
                                            per.persona_apellido1,
                                            per.persona_apellido2,
                                            per.persona_tipodocumento,
                                            pc.nombre_largo_parametro,
                                            pai.pais_nombre,
                                            dep.departamento_nombre,
                                            ciu.ciudad_nombre,
                                            per.persona_dni,
                                            per.persona_telefono,
                                            per.persona_estado,
                                            per.pais_codigo,
                                            per.departamento_codigo,
                                            per.ciudad_codigo,
                                            per.persona_direccion,
                                            per.persona_fnacimiento,
                                            per.persona_ciudadnacimiento,
                                            per.persona_avatar,
                                            per.persona_email,
                                            usr.usuario_id, usr.usuario_username, usr.usuario_pass,p.perfil_id, p.perfil_nombre, per.persona_avatar
                                        FROM personas per
                                        INNER JOIN usuarios  usr
                                            ON per.persona_id=usr.persona_id
                                        INNER JOIN parametros_configuracion pc
                                            ON per.persona_tipodocumento=pc.id_parametro
                                        INNER JOIN perfiles p
                                            ON p.perfil_id=usr.perfil_id
                                        INNER JOIN paises pai
                                            ON pai.pais_codigo=per.pais_codigo
                                        INNER JOIN departamentos dep
                                            ON dep.departamento_codigo=per.departamento_codigo
                                        INNER JOIN ciudades ciu
                                            ON ciu.ciudad_codigo=per.ciudad_codigo
                                        WHERE per.persona_estado=1");
        return $usuarios;

     }
    public static function getUsuarioSQL($persona_id){ //Obtener usuarios

        $sql="SELECT per.persona_id,
                     per.persona_nombre1,
                     per.persona_nombre2,
                     per.persona_apellido1,
                     per.persona_apellido2,
                     per.persona_tipodocumento,
                     per.persona_dni,
                     per.persona_telefono,
                     per.persona_estado,
                     per.pais_codigo,
                     per.departamento_codigo,
                     per.ciudad_codigo,
                     per.persona_direccion,
                     per.persona_fnacimiento,
                     per.persona_ciudadnacimiento,
                     per.persona_avatar,
                     per.persona_email,
                     pc.nombre_largo_parametro,
                     pai.pais_nombre,
                     dep.departamento_nombre,
                     ciu.ciudad_nombre,
                     usr.usuario_id, usr.usuario_username, usr.usuario_pass,p.perfil_id, p.perfil_nombre, per.persona_avatar
                FROM personas per
                INNER JOIN usuarios  usr
                    ON per.persona_id=usr.persona_id
                INNER JOIN parametros_configuracion pc
                    ON per.persona_tipodocumento=pc.id_parametro
                INNER JOIN perfiles p
                    ON p.perfil_id=usr.perfil_id
                INNER JOIN paises pai
                    ON pai.pais_codigo=per.pais_codigo
                INNER JOIN departamentos dep
                    ON dep.departamento_codigo=per.departamento_codigo
                INNER JOIN ciudades ciu
                    ON ciu.ciudad_codigo=per.ciudad_codigo
                WHERE per.persona_estado=1
                AND usr.persona_id=?";
        $usuario = DB::select($sql,array($persona_id));
        return $usuario;

     }


    public static function getRolSQL(){ //Obtener roles
        $roles=DB::select("SELECT perfil_id, perfil_nombre, perfil_descripcion
                    FROM perfiles
                    WHERE estado=1");
                    return $roles;
        }
    public static function getTipoDocSQL(){ //Obtener Tipo dee documento
        $tipodoc=DB::select("SELECT id_parametro, nombre_parametro, nombre_largo_parametro
                                FROM parametros_configuracion
                                WHERE estado=1
                                AND clave_parametro='tipodocumento'");
                    return $tipodoc;
        }
    public static function getCountrySQL(){ //Obtener Paises
        $paises=DB::select("SELECT pais_codigo, pais_nombre
                                FROM paises
                                WHERE pais_estado=1");
                    return $paises;
     }
    public static function getDepartmentsSQL(){ //Obtener Municipios
        $deptos=DB::select("SELECT departamento_codigo, departamento_nombre
                            FROM departamentos
                            WHERE departamento_estado=1
                            AND pais_codigo='CO'");
        return $deptos;
     }
    public static function getCitySQL(){ //Obtener ciudades
        $city=DB::select("SELECT ciudad_codigo, ciudad_nombre
                        FROM ciudades
                        WHERE ciudad_estado=1
                        AND departamento_codigo=76");
        return $city;
     }

    public static function getUserIDSQL($persona){//obtener usuario por id
        $usuarios=DB::select("SELECT (SELECT CONCAT (per.persona_nombre1,' ', per.persona_nombre2,' ', per.persona_apellido1,' ', per.persona_apellido2)) AS nombres,
                                                per.persona_nombre1,
                                                per.persona_nombre2,
                                                per.persona_apellido1,
                                                per.persona_apellido2,
                                                per.persona_tipodocumento,
                                                pc.nombre_largo_parametro,
                                                pai.pais_nombre,
                                                dep.departamento_nombre,
                                                ciu.ciudad_nombre,
                                                per.persona_dni,
                                                per.persona_telefono,
                                                per.persona_estado,
                                                per.pais_codigo,
                                                per.departamento_codigo,
                                                per.ciudad_codigo,
                                                per.persona_direccion,
                                                per.persona_fnacimiento,
                                                per.persona_ciudadnacimiento,
                                                per.persona_avatar,
                                                per.persona_email,
                                                usr.usuario_id, usr.usuario_username, usr.usuario_pass,p.perfil_id, p.perfil_nombre, per.persona_avatar
                                            FROM personas per
                                            INNER JOIN usuarios  usr
                                                ON per.persona_id=usr.persona_id
                                            INNER JOIN parametros_configuracion pc
                                                ON per.persona_tipodocumento=pc.id_parametro
                                            INNER JOIN perfiles p
                                                ON p.perfil_id=usr.perfil_id
                                            INNER JOIN paises pai
                                                ON pai.pais_codigo=per.pais_codigo
                                            INNER JOIN departamentos dep
                                                ON dep.departamento_codigo=per.departamento_codigo
                                            INNER JOIN ciudades ciu
                                                ON ciu.ciudad_codigo=per.ciudad_codigo
                                            WHERE per.persona_estado=1");
        return $usuarios;

     }
    public static function updatePersonSQL($usuario){//actualizar personas
        $sql="UPDATE personas p
                    INNER JOIN usuarios u
                        ON u.persona_id=p.persona_id
                            SET p.persona_nombre1=?,
                                p.persona_nombre2=?,
                                p.persona_apellido1=?,
                                p.persona_apellido2=?,
                                p.persona_tipodocumento=?,
                                p.persona_dni=?,
                                p.persona_telefono=?,
                                p.persona_fnacimiento=?,
                                p.persona_ciudadnacimiento=?,
                                p.pais_codigo=?,
                                p.departamento_codigo=?,
                                p.ciudad_codigo=?,
                                p.persona_direccion=?,
                                p.persona_email=?,
                                usuario_username=?,
                                usuario_pass=?,
                                perfil_id=?
                        WHERE p.persona_id=?";
        DB::select($sql,array($usuario->persona_nombre1,
                                $usuario->persona_nombre2,
                                $usuario->persona_apellido1,
                                $usuario->persona_apellido2,
                                $usuario->persona_tipodocumento,
                                $usuario->persona_dni,
                                $usuario->persona_telfono,
                                $usuario->persona_fnacimiento,
                                $usuario->persona_ciudadnacimiento,
                                $usuario->pais_codigo,
                                $usuario->departamento_codigo,
                                $usuario->ciudad_codigo,
                                $usuario->persona_direccion,
                                $usuario->persona_email,
                                $usuario->usuario_username,
                                $usuario->usuario_pass,
                                $usuario->usuario_perfil_id));
     }
/*     public static function updateUser($usuario){//actualizar usuarios
        $sql="UPDATE usuarios
                    SET usuario_username=?,
                        usuario_pass=?,
                        perfil_id=?
                WHERE persona_id=?";
        DB::select($sql,array($usuario->usuario_username, $usuario->usuario_pass, $usuario->usuario_perfil_id, $usuario->persona_id));
     }
} */
}
