<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productos extends Model
{
    use HasFactory;

    public function listPersonas(){
        $sql="SELECT *
            from personas";
        return $sql;
    }

    public function addPersonas(){
        $sql="INSERT
        INTO personas";

    }
}
