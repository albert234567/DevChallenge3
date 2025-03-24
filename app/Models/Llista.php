<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Llista extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'share_token' 
    ];

 
public function sharedUsers()
{
    return $this->belongsToMany(User::class, 'llista_user', 'llista_id', 'user_id');
}


    
    public function productes(): BelongsToMany
    {
        return $this->belongsToMany(Producte::class, 'llista_producte');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    

    
}
