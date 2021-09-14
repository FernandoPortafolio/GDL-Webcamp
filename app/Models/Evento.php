<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $fillable = [
        'evento',
        'fecha',
        'hora',
        'clave',
        'categoria_id',
        'invitado_id',
    ];

    public $timestamps = false;

    public function invitado()
    {
        return $this->belongsTo(Invitado::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
