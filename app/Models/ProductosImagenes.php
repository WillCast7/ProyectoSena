<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductosImagenes extends Model{
    use HasFactory;
    protected $table="productos_imagenes";
    protected $primaryKey="imagen_id";
    public $incrementing=true;
    public $timestamps=false;

    public static function getImagenesProductoSQL($producto_id){ //Obtener productos
        $sql="SELECT DISTINCT pri.imagen_id,
                            pri.producto_id,
                            pri.imagen_nombre,
                            pri.imagen_url,
                            pri.imagen_alt,
                            pri.imagen_title,
                            pri.imagen_tipo,
                            pri.imagen_orden,
                            pri.imagen_estado,
                            p.producto_nombre
                    FROM productos_imagenes pri
                    INNER JOIN productos p
                        ON p.producto_id=pri.producto_id
                    WHERE pri.producto_id=?";
        $productos=DB::select($sql, array($producto_id));
        return $productos;
     }
    public static function deleteImagenSQL($imagen_id){//Desactivar Imagen
        $sql="UPDATE productos_imagenes
                    SET imagen_estado=0
                WHERE imagen_id=?";
        DB::select($sql,array($imagen_id));
     }

    public static function undeleteImagenSQL($imagen_id){//Activar Imagen
        $sql="UPDATE productos_imagenes
                    SET imagen_estado=1
                WHERE imagen_id=?";
        DB::select($sql,array($imagen_id));
     }
}
