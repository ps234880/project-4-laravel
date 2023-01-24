<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pizza;

class Ingredient extends Model
{
    use HasFactory;
    protected $table = 'ingredients';
    protected $fillable = ['name', 'price'];
    public $timestamps = false;

    public function pizzas()
    {
        return $this->belongsToMany(Pizza::class);
    }
}
