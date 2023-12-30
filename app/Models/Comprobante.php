<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comprobante extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha',
        'comprobante',
        'detalle',
        'BrutoComp',
        'ParticIva',
        'MontoIva',
        'ExentoComp',
        'ImpInternoComp',
        'PercepcionIvaComp',
        'RetencionIB',
        'RetencionGan',
        'NetoComp',
        'MontoPagadoComp',
        'CantidadLitroComp',
<<<<<<< HEAD
=======
        'Cerrado',
>>>>>>> f7b4677012a3b7fdee8c490bea21faab66a3ad1a
        'Anio',
        'PasadoEnMes',
        'iva_id',
        'area_id',
        'cuenta_id',
        'user_id',
        'empresa_id',
        'proveedor_id',
    ];

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

    public function cuenta()
    {
        return $this->belongsTo(Cuenta::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }
}
