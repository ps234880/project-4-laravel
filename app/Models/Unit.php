<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $table = 'units';
    protected $fillable = ['name'];
    public $timestamps = false;

    public function ingredient()
    {
        return $this->hasOne(Ingredient::class);
    }
}
