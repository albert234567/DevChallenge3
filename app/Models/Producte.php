<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producte extends Model
{
    use HasFactory;

    protected $table = 'productes'; // Nom de la tabla

    protected $fillable = ['name', 'categoria_nom', 'quantitat', 'llista_id'];
    
    public function categoria()
    {
        return $this->belongsTo(Categoria::class); // Relació amb Categoria
    }

    public function llistas()
    {
        return $this->belongsTo(Llista::class, 'llista_id');
    }

    public function marcarCompletat()
    {
        $this->completat = true;
        $this->save();
    }

    public function desmarcarCompletat()
    {
        $this->completat = false;
        $this->save();
    }


    // Desactivar les dates automàtiques
    public $timestamps = false;



}
