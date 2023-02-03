<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ingredient;

class Pizza extends Model
{
    use HasFactory;
    protected $table = 'pizzas';
    protected $fillable = ['name'];
    public $timestamps = false;

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class);
    }

    public function order()
    {
        return $this->hasOne(OrderLine::class);
    }
}
