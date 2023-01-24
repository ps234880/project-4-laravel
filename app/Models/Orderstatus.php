<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Orderstatus extends Model
{
    use HasFactory;
    protected $table = 'orderstatus';
    protected $fillable = [
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
