<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TotalOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_details_id',
        'total_amount',
    ];

    public function order(){
        return $this->belongsTo(Order::class);
    }
    
    
}
