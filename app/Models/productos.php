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

    public function listado(){

        $usuarios=usuario::getUsuariosSQL();
        $roles=usuario::getRol();
        $tipoDoc=usuario::getTipoDoc();
        $productos=productos::getProductosSQL();
        $categorias=productos::getCat();
        $marcas=productos::getMarca();
        $paises=usuario::getCountry();
        $deptos=usuario::getDepartments();
        $city=usuario::getCity();
        return view('usuariosDashboard', compact('usuarios', 'roles', 'productos', 'categorias', 'tipoDoc', 'paises', 'deptos', 'city', 'marcas'));

     }
    public static function getProductosSQL(){ //Obtener usuarios

        $productos=DB::select("SELECT pr.producto_nombre,
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
                                LEFT JOIN productos_imagenes pri
                                    ON pri.producto_id=pr.producto_id
                                WHERE producto_estado=1");
        return $productos;

     }

        public static function getCat(){ //Obtener Categorias
            $categoria=DB::select("SELECT categoria_id, categoria_nombre, categoria_padre, categoria_url
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
