<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'item_id',
        'order_id',
        'quantity'
    ];

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function orderItems(){
        return $this->belongsTo(Item::class, 'item_id');
    }

    
}
