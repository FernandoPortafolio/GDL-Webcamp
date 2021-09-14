<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'total',
        'pagado',
    ];

    public function eventos()
    {
        return $this->belongsToMany(Evento::class, 'registro_eventos');
    }

    public function pedido()
    {
        return $this->hasOne(Pedido::class);
    }
}
