<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CategoriesModel extends Model
{
    use HasFactory;

    protected $table = "categorias";
    protected $primaryKey = "categoria_id";

    public $incrementing = true;
    
    public $timestamps = false;
    //create_at
    //update_at

    
    public static function get(){
        $sql = "SELECT 
                    ca.categoria_id as categoriapadre_id,
                    ca.categoria_nombre as categoriapadre_nombre,
                    ca.categoria_url as categoriapadre_url,
                    ca1.categoria_id,
                    ca1.categoria_nombre,
                    ca1.categoria_url
                from 
                    categorias ca
                    left join categorias ca1
                        on ca1.categoria_padre = ca.categoria_id
                where 
                    ca.categoria_padre is null
                    and ca.categoria_estado = 1
                    and ca1.categoria_estado = 1
                    order by ca.categoria_nombre, ca1.categoria_nombre";
        $result = DB::select($sql);
        return $result;
    }


}