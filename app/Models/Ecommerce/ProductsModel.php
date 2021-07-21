<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductsModel extends Model{
    use HasFactory;

    protected $table = "productos";
    protected $primaryKey = "producto_id";

    public $incrementing = true;
    
    public $timestamps = false;
    //create_at
    //update_at

    public static function getByUrlCategory($url){
        $sql = "SELECT 
                    pr.*,
                    pi.*
                from
                    productos pr
                inner join productos_imagenes pi
                    on pi.producto_id = pr.producto_id
                    and pi.imagen_tipo = 'PRODUCTO'
                inner join 
                    (select * from categorias where categoria_padre = (select categoria_id from categorias where categoria_url = ?) ) ca2
                    on ca2.categoria_id = pr.categoria_id
                union
                select 
                    pr.*,
                    pi.* 
                from 
                    productos pr
                inner join productos_imagenes pi
                    on pi.producto_id = pr.producto_id
                    and pi.imagen_tipo = 'PRODUCTO'
                inner join categorias ca
                    on ca.categoria_id = pr.categoria_id
                    and ca.categoria_url = ?";
        $result = DB::select($sql,array($url,$url));
        return $result;
    }
}
