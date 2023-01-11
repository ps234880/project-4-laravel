<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    // moet table aangeven want default path zou "restaurants" zijn
    protected $table = 'restauranten';
    protected $fillable = [
        'restaurant',
        'gerechten'
    ];

    public function restauranten()
    {
        return $this->belongsToMany(Album::class);
    }
}
