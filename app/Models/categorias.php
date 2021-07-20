<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorias extends Model
{
    use HasFactory;
    protected $table="categorias";
    protected $primaryKey="categoria_id";
    public $incrementing=true;
    public $timestamps=false;

    public static function getCategoriasSQL(){ //Obtener Categorias
        $categoria=DB::select("SELECT categoria_id, categoria_nombre, categoria_padre, categoria_url, categoria_estado
                                    FROM categorias");
        return $categoria;
     }
    public static function getFormCategoriasSQL(){ //Obtener Categorias
        $categoria=DB::select("SELECT categoria_id, categoria_nombre, categoria_padre, categoria_url, categoria_estado
                                    FROM categorias
                                    WHERE categoria_estado=1");
        return $categoria;
     }

    public static function getCategoriaSQL($categoria_id){//obtener categoria
        $sql="SELECT categoria_id,
                     categoria_nombre,
                     categoria_padre,
                     categoria_url,
                     categoria_estado
                FROM categorias
                WHERE categoria_id=?";
        $categoria=DB::select($sql,array($categoria_id));
        return $categoria;
      }
    public static function updateCategoriaSQL($categoria, $categoria_id){//actualizar categoria
        $sql="UPDATE categorias
                   SET categoria_nombre=?,
                   categoria_url=?,
                   categoria_padre=?
               WHERE categoria_id=?";
       DB::select($sql,array($categoria->categoria_nombre,
                             $categoria->categoria_url,
                             $categoria->categoria_padre,
                             $categoria_id));

     }
    public static function deleteCategoriaSQL($categoria_id){//Desactivar categoria
        $sql="UPDATE categorias
                    SET categoria_estado=0
                WHERE categoria_id=?";
        DB::select($sql,array($categoria_id));
      }

    public static function undeleteCategoriaSQL($categoria_id){//Activar categoria
        $sql="UPDATE categorias
                    SET categoria_estado=1
                WHERE categoria_id=?";
        DB::select($sql,array($categoria_id));
     }

}
