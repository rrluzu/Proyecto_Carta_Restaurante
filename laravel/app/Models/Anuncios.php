<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anuncios extends Model
{
    use HasFactory;

    protected $table = 'anuncios'; // Asegura que Laravel use la tabla correcta
    protected $primaryKey = 'id'; // Especifica la clave primaria si no es "id"
    public $timestamps = true; // Indica si se usan los timestamps created_at y updated_at
    protected $fillable = ['titulo', 'mensaje', 'fecha_inicio', 'fecha_fin', 'mensaje_telegram_id'];
}
