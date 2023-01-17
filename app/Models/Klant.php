<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bestelling;

class Klant extends Model
{
    use HasFactory;
    // moet table aangeven want default path zou "pizzas" zijn
    protected $table = 'klanten';
    protected $fillable = [
        'naam',
        'straat',
        'huisnummer',
        'postcode',
        'woonplaats',
        'telefoonnummer',
        'e-mailadres',
        'bestelling_id'
    ];

    public function bestellingen()
    {
        return $this->hasMany(Bestelling::class);
    }
}
