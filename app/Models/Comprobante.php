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

<<<<<<< HEAD
=======
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

>>>>>>> 71cf9addfa7dc992098f5a94d8517b79fe83507c
    public function cuenta()
    {
        return $this->belongsTo(Cuenta::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

<<<<<<< HEAD
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }
=======
    public function usuario(){
        return $this->belongsTo(User::class);
    }
>>>>>>> 71cf9addfa7dc992098f5a94d8517b79fe83507c
}
