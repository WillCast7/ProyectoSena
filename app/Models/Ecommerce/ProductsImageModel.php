<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsImageModel extends Model{
    use HasFactory;
    protected $table = "productos_imagenes";
    protected $primaryKey = "imagen_id";

    public $incrementing = true;
    
    public $timestamps = false;
}
