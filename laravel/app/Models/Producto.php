<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Producto extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'productos'; // Asegúrate de que el nombre de la tabla sea correcto
    protected $primaryKey = 'id'; // Ajusta el nombre de la clave primaria si es necesario
    public $timestamps = true; // Para created_at y updated_at

    // Campos que se pueden asignar de forma masiva 
    protected $fillable = ['nombre', 'descripcion', 'precio', 'categoria_id', 'imagen'];
    
    // Relación con la categoría
    public function categoria() {
        return $this->belongsTo(Categoria::class, 'categoria_id', 'id_categorias');
    }       

    // Definir conversiones de medios
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
             ->width(300)
             ->height(300)
             ->sharpen(10);
    }
}