<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ingrediënt;

class Pizza extends Model
{
    use HasFactory;
    // moet table aangeven want default path zou "pizzas" zijn
    protected $table = 'pizzas';
    protected $fillable = [
        'naam'
    ];

    public function ingrediënten()
    {
        return $this->belongsToMany(Ingrediënt::class);
    }
}
