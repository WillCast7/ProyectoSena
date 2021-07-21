<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetailModel extends Model{
    use HasFactory;

    protected $table        = "detalle_pedidos";
    protected $primaryKey   = "detallepedido_id";
    public $incrementing    = true;
    public $timestamps      = false;

    protected $fillable = [
        'pedido_id',
        'producto_id',
        'detallepedido_valorunitario',
        'detallepedido_cantidad',
        'detallepedido_valortotal'
    ];
}
