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

    public static function getProductosSQL(){ //Obtener productos

        $productos=DB::select("SELECT pr.producto_nombre,
                                    pr.producto_id,
                                    pr.producto_stock,
                                    pr.producto_descripcion,
                                    pr.producto_estado,
                                    pr.marca_id,
                                    mr.marca_nombre,
                                    cat.categoria_nombre,
                                    pri.imagen_url
                                FROM productos pr
                                INNER JOIN categorias cat
                                    ON cat.categoria_id=pr.categoria_id
                                LEFT JOIN marcas mr
                                    ON mr.marca_id=pr.marca_id
                                LEFT JOIN productos_imagenes pri
                                    ON pri.producto_id=pr.producto_id");
        return $productos;

     }
    public static function getFormProductosSQL(){ //Obtener productos activos

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
                                    ON pri.producto_id=pr.producto_id
                                WHERE pr.producto_estado=1");
        return $productos;

     }
    public static function getProductoSQL($producto_id){ //Obtener producto
        $sql="SELECT pr.producto_id,
                        pr.producto_nombre,
                        pr.producto_stock,
                        pr.producto_descripcion,
                        pr.producto_estado,
                        pr.marca_id,
                        pr.categoria_id,
                        pr.producto_referencia,
                        pr.producto_descripcioncorta,
                        pr.producto_precio,
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
    public static function updateProductoSQL($producto, $producto_id){//actualizar Productos
        $sql="UPDATE productos
                   SET producto_nombre=?,
                   producto_referencia=?,
                   producto_descripcion=?,
                   producto_descripcioncorta=?,
                   categoria_id=?,
                   marca_id=?,
                   producto_stock=?,
                   producto_precio=?
               WHERE producto_id=?";
       DB::select($sql,array($producto->producto_nombre,
                               $producto->producto_referencia,
                               $producto->producto_descripcion,
                               $producto->producto_descripcioncorta,
                               $producto->categoria_id,
                               $producto->marca_id,
                               $producto->producto_stock,
                               $producto->producto_precio,
                               $producto_id));

     }
    public static function deleteProductoSQL($producto_id){//Desactivar producto
        $sql="UPDATE productos
                    SET producto_estado=0
                WHERE producto_id=?";
        DB::select($sql,array($producto_id));
     }

    public static function undeleteProductoSQL($producto_id){//Activar producto
        $sql="UPDATE productos
                    SET producto_estado=1
                WHERE producto_id=?";
        DB::select($sql,array($producto_id));
     }
}
