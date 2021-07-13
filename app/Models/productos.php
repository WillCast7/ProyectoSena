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
                                    pr.producto_stock,
                                    pr.producto_descripcion,
                                    cat.categoria_nombre,
                                    mr.marca_nombre
                                FROM productos pr
                                INNER JOIN categorias cat
                                    ON cat.categoria_id=pr.categoria_id
                                INNER JOIN marcas mr
                                    ON mr.marca_id=pr.marca_id
                                /* SELECT pr.producto_nombre,
                                    pr.producto_stock,
                                    pr.producto_descripcion,
                                    cat.categoria_nombre,
                                    mr.marca_nombre,
                                    pri.imagen_url
                                FROM productos pr
                                INNER JOIN categorias cat
                                    ON cat.categoria_id=pr.categoria_id
                                INNER JOIN marcas mr
                                    ON mr.marca_id=pr.marca_id
                                INNER JOIN productos_imagenes pri
                                    ON pri.producto_id=pr.producto_id
                                ORDER BY cat.categoria_nombre */"
                            );
        return $productos;

     }

        public static function getCat(){ //Obtener Categorias
            $categoria=DB::select("SELECT categoria_id, categoria_nombre
                                        FROM categorias
                                        WHERE categoria_estado=1");
            return $categoria;
        }

        public static function getMarca(){ //Obtener Categorias
            $marca=DB::select("SELECT marca_id, marca_nombre
                                FROM marcas
                                WHERE marca_estado=1");
            return $marca;
        }

}
