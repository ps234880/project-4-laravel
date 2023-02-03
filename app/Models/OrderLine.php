<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
    use HasFactory;

    protected $table = 'order_line';
    public $timestamps = false;
    protected $fillable = [
        'order_id',
        'pizza_id',
        'size',
        'amount'
    ];

    public function order()
    {   
        return $this->belongsTo(order::class);
    }

    public function pizza()
    {   
        return $this->belongsTo(Pizza::class);
    }

    public function size()
    {   
        return $this->belongsTo(Size::class);
    }
}
