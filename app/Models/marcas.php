<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class marcas extends Model
{
    use HasFactory;
    protected $table="marcas";
    protected $primaryKey="marca_id";
    public $incrementing=true;
    public $timestamps=false;

    public static function getMarcasSQL(){//obtener marcas
        $marca=DB::select("SELECT marca_id,
                                marca_nombre,
                                marca_estado,
                                marca_imagen
                            FROM marcas");
        return $marca;
     }
    public static function getFormMarcasSQL(){//obtener marcas Activas
        $marca=DB::select("SELECT marca_id,
                                marca_nombre,
                                marca_estado,
                                marca_imagen
                            FROM marcas
                            WHERE marca_estado=1");
        return $marca;
     }
    public static function getMarcaSQL($marca_id){//obtener marca
        $sql="SELECT marca_id,
                    marca_nombre,
                    marca_estado,
                    marca_imagen
                            FROM marcas
                            WHERE marca_id=?";
        $marca=DB::select($sql, array($marca_id));
        return $marca;

     }


    public static function updateMarcaSQL($marca, $marca_id){//actualizar Marcas
        $sql="UPDATE marcas
                   SET marca_nombre=?,
                   marca_imagen=?
               WHERE marca_id=?";
       DB::select($sql,array($marca->marca_nombre,
                             $marca->marca_imagen,
                             $marca_id));

     }
    public static function deleteMarcaSQL($marca_id){//Desactivar Marca
        $sql="UPDATE marcas
                    SET marca_estado=0
                WHERE marca_id=?";
        DB::select($sql,array($marca_id));
      }

    public static function undeleteMarcaSQL($marca_id){//Activar Marca
        $sql="UPDATE marcas
                    SET marca_estado=1
                WHERE marca_id=?";
        DB::select($sql,array($marca_id));
     }
}
