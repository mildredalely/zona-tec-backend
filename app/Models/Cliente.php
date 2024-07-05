<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'nombre',
        'telefono',
        'tipo_dispositivo',
        'otro_dispositivo',
        'modelo',
        'observaciones',
        'diagnostico',
        'especificaciones',
        'status'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($cliente) {
            $cliente->folio = substr(uniqid(), -4); // Generamos un ID único para el folio
        });
    }

}
