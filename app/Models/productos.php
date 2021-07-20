<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class productos extends Model
{
    use HasFactory;
    protected $table="productos";
    protected $primaryKey="producto_id";
    public $incrementing=true;
    public $timestamps=false;

    public static function getProductosSQL(){ //Obtener usuarios

        $productos=DB::select("SELECT pr.producto_nombre,
                                    pr.producto_id,
                                    pr.producto_stock,
                                    pr.producto_descripcion,
                                    cat.categoria_nombre,
                                    mr.marca_nombre,
                                    pri.imagen_url,
                                    pr.producto_estado
                                FROM productos pr
                                INNER JOIN categorias cat
                                    ON cat.categoria_id=pr.categoria_id
                                INNER JOIN marcas mr
                                    ON mr.marca_id=pr.marca_id
                                LEFT JOIN productos_imagenes pri
                                    ON pri.producto_id=pr.producto_id");
        return $productos;

     }
    public static function getProductoSQL($producto_id){ //Obtener usuario

        $sql="SELECT pr.producto_nombre,
                        pr.producto_stock,
                        pr.producto_descripcion,
                        pr.producto_estado,
                        cat.categoria_nombre,
                        mr.marca_nombre,
                        pri.imagen_url
                    FROM productos pr
                    INNER JOIN categorias cat
                        ON cat.categoria_id=pr.categoria_id
                    INNER JOIN marcas mr
                        ON mr.marca_id=pr.marca_id
                    LEFT JOIN productos_imagenes pri
                        ON pri.producto_id=pr.producto_id
                    WHERE pr.producto_id=?";
                $producto=DB::select($sql,array($producto_id));
        return $producto;
     }
    public static function deleteProductoSQL($producto_id){//Desactivar usuario
        $sql="UPDATE productos
                    SET producto_estado=0
                WHERE producto_id=?";
        DB::select($sql,array($producto_id));
     }

    public static function undeleteProductoSQL($producto_id){//Activar usuario
        $sql="UPDATE productos
                    SET producto_estado=1
                WHERE producto_id=?";
        DB::select($sql,array($producto_id));
     }
}
