<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    protected $table = 'sizes';
    protected $fillable = ['name'];
    public $timestamps = false;

    public function ingredient()
    {
        return $this->hasOne(Ingredient::class);
    }

    public function orderline()
    {
        return $this->hasOne(orderline::class);
    }
}
