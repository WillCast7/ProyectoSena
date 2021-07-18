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


        $usuarios = DB::table('usuarios')
        ->join('personas', 'personas.persona_id', '=', 'usuarios.persona_id')
        ->select('personas.*', 'usuario_username', 'usuario_id')
        ->get();
        return $usuarios;

     }
    public static function getUsuariosSQL(){ //Obtener usuarios

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
                                            usr.usuario_username, usr.usuario_pass,p.perfil_id, p.perfil_nombre, per.persona_avatar
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


    public static function getRol(){ //Obtener roles
        $roles=DB::select("SELECT perfil_id, perfil_nombre, perfil_descripcion
                    FROM perfiles
                    WHERE estado=1");
                    return $roles;
        }
    public static function getTipoDoc(){ //Obtener Tipo dee documento
        $tipodoc=DB::select("SELECT id_parametro, nombre_parametro, nombre_largo_parametro
                                FROM parametros_configuracion
                                WHERE estado=1
                                AND clave_parametro='tipodocumento'");
                    return $tipodoc;
        }
    public static function getCountry(){ //Obtener Paises
        $paises=DB::select("SELECT pais_codigo, pais_nombre
                                FROM paises
                                WHERE pais_estado=1");
                    return $paises;
     }
    public static function getDepartments(){ //Obtener Municipios
        $deptos=DB::select("SELECT departamento_codigo, departamento_nombre
                            FROM departamentos
                            WHERE departamento_estado=1
                            AND pais_codigo='CO'");
        return $deptos;
     }
    public static function getCity(){ //Obtener ciudadesa
        $city=DB::select("SELECT ciudad_codigo, ciudad_nombre
                        FROM ciudades
                        WHERE ciudad_estado=1
                        AND departamento_codigo=76");
        return $city;
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
    public static function getUserID($persona){
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
                                                usr.usuario_username, usr.usuario_pass,p.perfil_id, p.perfil_nombre, per.persona_avatar
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
    /* public static function getSex(){//obtener sexos
        $sex=DB::select("SELECT id_parametro, nombre_parametro, nombre_largo_parametro
                            FROM parametros_configuracion
                            WHERE estado=1
                            AND clave_parametro='sexo'");
        return $sex;
     } */
}
