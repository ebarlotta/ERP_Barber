<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    //Relacion uno a muchos inversa

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function usuario(){
        return $this->belongsTo(User::class);
    }

    //Relación de uno a muchos
    public function recibos()
    {
        return $this->hasMany(Recibo::class);
    }
}
