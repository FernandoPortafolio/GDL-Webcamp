<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $fillable = [
        'camisas',
        'etiquetas',
        'boletos_un_dia',
        'boletos_dos_dias',
        'boletos_completo',
        'regalo_id',
        'registro_id',
    ];

    public function regalo()
    {
        return $this->belongsTo(Regalo::class);
    }
}
