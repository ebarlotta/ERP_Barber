<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoriaproducto extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'empresa_id',
    ];
}
