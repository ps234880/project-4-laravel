<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PizzaPoint extends Model
{
    use HasFactory;

    public function totalPoints()
    {
        PizzaPoint::all()->count();
    }

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}
