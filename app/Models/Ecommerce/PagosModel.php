<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagosModel extends Model{
    use HasFactory;

    protected $table = "pagos";
    protected $primaryKey = "pago_id";

    protected $fillable = [
        'pago_id',
        'pedido_id',
        'pago_titular',
        'pago_cardnumber',
        'pago_expirydate',
        'pago_securitycode',
        'pago_valor',
        'pago_fcreacion',
        'pago_estado'
    ];

    public $incrementing = true;
    
    public $timestamps = false;




}
