<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Klant;


class Bestelling extends Model
{
    use HasFactory;
    // moet table aangeven want default path zou "pizzas" zijn
    protected $table = 'bestellingen';
    protected $fillable = [
        'bon',
        'bestelstatus_id'
    ];

    public function klant()
    {
        return $this->belongsTo(Klant::class);
    }
}
