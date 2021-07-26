<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrderModel extends Model{
    use HasFactory;


    protected $table = "pedidos";
    protected $primaryKey = "pedido_id";

    protected $fillable = [
        'persona_id',
        'pedido_nombre',
        'pedido_apellidos',
        'pedido_telefono',
        'pedido_email',
        'departamento_codigo',
        'ciudad_codigo',
        'pedido_direccion',
        'pedido_zipcode',
        'pedido_subtotal',
        'pedido_impuestos',
        'pedido_total',
        'pedido_estado',
        'pedido_creadopor',
        'pedido_fcreacion',
        'pedido_actualizadopor',
        'pedido_factualizacion'
     ];

    public $incrementing = true;
    public $timestamps = false;

     public static function getOrdersSQL(){
        $orders=DB::select("SELECT o.pedido_id,
                o.persona_id,
                o.pedido_nombre,
                o.pedido_apellidos,
                o.pedido_telefono,
                o.pedido_email,
                o.departamento_codigo,
                o.ciudad_codigo,
                o.pedido_direccion,
                o.pedido_zipcode,
                o.pedido_subtotal,
                o.pedido_impuestos,
                o.pedido_total,
                o.pedido_observacion,
                o.pedido_estado,
                dep.departamento_nombre,
                ciu.ciudad_nombre
            FROM pedidos o
            INNER JOIN departamentos dep
            ON dep.departamento_codigo=o.departamento_codigo
            INNER JOIN ciudades ciu
            ON ciu.ciudad_codigo=o.ciudad_codigo");
        return $orders;
    }

}
