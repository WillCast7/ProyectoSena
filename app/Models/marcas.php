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

    public static function getMarcasSQL(){
        $marca=DB::select("SELECT marca_id, marca_nombre
                            FROM marcas
                            WHERE marca_estado=1");
        return $marca;
     }
}
