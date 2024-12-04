<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categorias'; // Nom de la taula

    protected $fillable = [
        'name', // Nom de la categoria
    ];

    public function productes()
    {
        return $this->hasMany(Producte::class); // Relació amb Producte
    }
}
