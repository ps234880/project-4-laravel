<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;
    // moet table aangeven want default path zou "pizzas" zijn
    protected $table = 'pizzas';
    protected $fillable = [
        'naam'
    ];

    public function pizzas()
    {
        return $this->belongsTo(Ingrediënt_Pizza::class);
    }
}
