<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
    ];

    public function orderDetails(){
        return $this->hasMany(OrderDetail::class);
    }

    public function totalOrder(){
        return $this->hasOne(TotalOrder::class, 'order_id');
    }
    
}
