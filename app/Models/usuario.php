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
        $usuarios=DB::select("SELECT DISTINCT per.persona_id,
                                            (SELECT CONCAT (per.persona_nombre1,' ', per.persona_nombre2,' ', per.persona_apellido1,' ', per.persona_apellido2)) AS nombres,
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
                                            per.usuario_username,
                                            per.usuario_pass,
                                            p.perfil_id, p.perfil_nombre, per.persona_avatar
                                        FROM personas per
                                        INNER JOIN parametros_configuracion pc
                                            ON pc.id_parametro=per.persona_tipodocumento
                                        INNER JOIN perfiles p
                                            ON p.perfil_id=per.perfil_id
                                        INNER JOIN paises pai
                                            ON pai.pais_codigo=per.pais_codigo
                                        INNER JOIN departamentos dep
                                            ON dep.departamento_codigo=per.departamento_codigo
                                        INNER JOIN ciudades ciu
                                            ON ciu.ciudad_codigo=per.ciudad_codigo");
         return $usuarios;

         }
    public static function getFormUsuariosSQL(){ //Obtener usuarios activos

        $usuarios=DB::select("SELECT DISTINCT per.persona_id,
                                            (SELECT CONCAT (per.persona_nombre1,' ', per.persona_nombre2,' ', per.persona_apellido1,' ', per.persona_apellido2)) AS nombres,
                                            per.persona_nombre1,
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
                                            per.usuario_username,
                                            per.usuario_pass,
                                            p.perfil_id, p.perfil_nombre, per.persona_avatar
                                        FROM personas per
                                        INNER JOIN parametros_configuracion pc
                                            ON per.persona_tipodocumento=pc.id_parametro
                                        INNER JOIN perfiles p
                                            ON p.perfil_id=per.perfil_id
                                        INNER JOIN paises pai
                                            ON pai.pais_codigo=per.pais_codigo
                                        INNER JOIN departamentos dep
                                            ON dep.departamento_codigo=per.departamento_codigo
                                        INNER JOIN ciudades ciu
                                            ON ciu.ciudad_codigo=per.ciudad_codigo
                                        WHERE per.persona_estado=1");
         return $usuarios;

         }
    public static function getUsuarioSQL($persona_id){ //Obtener usuario
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
                     per.persona_tipodocumento,
                     per.pais_codigo,
                     per.usuario_username,
                     per.usuario_pass,
                     per.perfil_id,
                     per.persona_avatar,
                     pc.nombre_largo_parametro,
                     p.perfil_nombre,
                     pai.pais_nombre,
                     dep.departamento_nombre,
                     ciu.ciudad_nombre
                FROM personas per
                INNER JOIN parametros_configuracion pc
                    ON pc.id_parametro=per.persona_tipodocumento
                INNER JOIN perfiles p
                    ON p.perfil_id=per.perfil_id
                INNER JOIN paises pai
                    ON pai.pais_codigo=per.pais_codigo
                INNER JOIN departamentos dep
                    ON dep.departamento_codigo=per.departamento_codigo
                INNER JOIN ciudades ciu
                    ON ciu.ciudad_codigo=per.ciudad_codigo
                WHERE per.persona_id=?";
        $usuario = DB::select($sql,array($persona_id));
        return $usuario;

     }


    public static function getRolSQL(){ //Obtener roles
        $roles=DB::select("SELECT DISTINCT perfil_id,
                                perfil_nombre,
                                perfil_descripcion
                            FROM perfiles");
                    return $roles;
        }
    public static function getTipoDocSQL(){ //Obtener Tipo dee documento
        $tipodoc=DB::select("SELECT DISTINCT id_parametro, nombre_parametro, nombre_largo_parametro
                                FROM parametros_configuracion
                                WHERE estado=1
                                AND clave_parametro='tipodocumento'");
                    return $tipodoc;
        }
    public static function getCountrySQL(){ //Obtener Paises
        $paises=DB::select("SELECT DISTINCT pais_codigo, pais_nombre
                                FROM paises
                                WHERE pais_estado=1");
                    return $paises;
     }
    public static function getDepartmentsSQL(){ //Obtener Municipios
        $deptos=DB::select("SELECT DISTINCT departamento_codigo, departamento_nombre
                            FROM departamentos
                            WHERE departamento_estado=1
                            AND pais_codigo='CO'");
        return $deptos;
     }
    public static function getCitySQL(){ //Obtener ciudades
        $city=DB::select("SELECT DISTINCT ciudad_codigo, ciudad_nombre
                        FROM ciudades
                        WHERE ciudad_estado=1
                        AND departamento_codigo=76");
        return $city;
     }


    public static function updatePersonSQL($usuario, $persona_id){//actualizar personas
         $sql="UPDATE personas
                    SET persona_nombre1=?,
                        persona_nombre2=?,
                        persona_apellido1=?,
                        persona_apellido2=?,
                        persona_tipodocumento=?,
                        persona_dni=?,
                        persona_telefono=?,
                        persona_fnacimiento=?,
                        persona_ciudadnacimiento=?,
                        pais_codigo=?,
                        departamento_codigo=?,
                        ciudad_codigo=?,
                        persona_direccion=?,
                        persona_email=?,
                        usuario_username=?,
                        usuario_pass=?,
                        perfil_id=?,
                        persona_avatar=?
                WHERE persona_id=?";
        DB::select($sql,array($usuario->persona_nombre1,
                                $usuario->persona_nombre2,
                                $usuario->persona_apellido1,
                                $usuario->persona_apellido2,
                                $usuario->persona_tipodocumento,
                                $usuario->persona_dni,
                                $usuario->persona_telefono,
                                $usuario->persona_fnacimiento,
                                $usuario->persona_ciudadnacimiento,
                                $usuario->pais_codigo,
                                $usuario->departamento_codigo,
                                $usuario->ciudad_codigo,
                                $usuario->persona_direccion,
                                $usuario->persona_email,
                                $usuario->usuario_username,
                                $usuario->usuario_pass,
                                $usuario->perfil_id,
                                $usuario->persona_avatar,
                                $persona_id));

     }

    public static function deleteUserSQL($persona_id){//Desactivar usuario
        $sql="UPDATE personas
                    SET persona_estado=0
                WHERE persona_id=?";
        DB::select($sql,array($persona_id));
     }

    public static function undeleteUserSQL($persona_id){//Activar usuario
        $sql="UPDATE personas
                    SET persona_estado=1
                WHERE persona_id=?";
        DB::select($sql,array($persona_id));
     }


}
