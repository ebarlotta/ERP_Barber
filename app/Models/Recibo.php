<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recibo extends Model
{
    use HasFactory;
    
    //Relacion uno a muchos inversa
    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }

    //Relacion de uno a muchos
    public function conceptosrecibos()
    {
        return $this->hasMany(ConceptoRecibo::class);
    }
}
