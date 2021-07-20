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
                                    FROM categorias
                                    ");
        return $categoria;
     }


}
