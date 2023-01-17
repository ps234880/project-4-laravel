<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Klant;


class Bestelstatus extends Model
{
    use HasFactory;
    // moet table aangeven want default path zou "pizzas" zijn
    protected $table = 'bestelstatus';
    protected $fillable = [
        'naam'
    ];

    public function klant()
    {
        return $this->belongsTo(Bestelling::class);
    }
}
