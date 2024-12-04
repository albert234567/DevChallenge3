<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producte extends Model
{
    use HasFactory;

    protected $table = 'productes'; // Nom de la tabla

    protected $fillable = ['nom', 'categoria_id', 'completat', 'llista_id', 'quantitat'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class); // Relació amb Categoria
    }

    public function llistas(): BelongsToMany
{
    return $this->belongsToMany(Llista::class, 'llista_producte');
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

}
