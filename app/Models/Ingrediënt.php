<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingrediënt extends Model
{
    use HasFactory;
    // moet table aangeven want default path zou "pizzas" zijn
    protected $table = 'ingrediënten';
    protected $fillable = [
        'naam',
        'prijs'
    ];

    public function ingrediënten()
    {
        return $this->belongsTo(Ingrediënt_Pizza::class);
    }
}
