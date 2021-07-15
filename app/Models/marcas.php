<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class marcas extends Model
{
    use HasFactory;
    protected $table="marcas";
    protected $primaryKey="marca_id";
    public $incrementing=true;
    public $timestamps=false;
}
