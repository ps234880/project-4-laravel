<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ingrediënt;
use App\Models\Pizza;

class Ingrediënt_Pizza extends Model
{
    use HasFactory;
    // moet table aangeven want default path zou "pizzas" zijn
    protected $table = 'ingrediënt_pizza';
    protected $fillable = [
        'ingrediënt_id',
        'pizza_id'
    ];

    public function ingrediënt_pizza()
    {
        return $this->hasMany(Bestelling::class);
    }
}
