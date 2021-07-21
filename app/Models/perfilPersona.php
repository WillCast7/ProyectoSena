<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perfilPersona extends Model
{
    use HasFactory;
    protected $table="perfiles_usuarios";
    protected $primaryKey="usuario_id";
    public $incrementing=true;
    public $timestamps=false;
}
