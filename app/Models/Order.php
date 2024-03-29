<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'receipt',
        'orderstatus_id',
        'user_id',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
