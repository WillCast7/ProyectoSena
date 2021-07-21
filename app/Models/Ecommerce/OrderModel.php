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



}
