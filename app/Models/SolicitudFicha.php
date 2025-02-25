<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class SolicitudFicha extends Model
{
    use HasFactory;

    protected $table = 'solicitudes_ficha';

    protected $fillable = ['correo', 'producto_id'];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
