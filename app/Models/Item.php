<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Item extends Model    
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'image',
        'category_id',
    ];

    public function orderDetail(){
        return $this->hasOne(OrderDetail::class, 'item_id');
    }
}
