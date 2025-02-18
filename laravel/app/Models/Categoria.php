<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    // Declarar el nombre de la tabla ayuda a que el framework no se equivoque
    protected $table = 'categorias';
    protected $primaryKey = 'id_categorias'; // Especifica la clave primaria ya que puede variar
    public $timestamps = true; // Indica si se usan los timestamps created_at y updated_at
    protected $fillable = ['nombre', 'descripcion']; // Campos por donde pasan los datos de forma masiva

    // Relación con productos (Una categoría tiene muchos productos)
    public function productos(){return $this->hasMany(Producto::class, 'categoria_id');}
}
