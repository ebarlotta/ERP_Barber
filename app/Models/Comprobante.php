<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comprobante extends Model
{
    use HasFactory;

    //Relación uno a uno

    public function iva()
    {
        return $this->belongsTo('App\Models\Iva');
    }


    //Relacion uno a muchos inversa

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function cuenta()
    {
        return $this->belongsTo(Cuenta::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function usuario(){
        return $this->belongsTo(User::class);
    }
}
