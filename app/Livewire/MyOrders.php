<?php

namespace App\Livewire;

use Livewire\Component;
use Auth;
use App\Models\OrderDetail;

class MyOrders extends Component
{
    public function render(){
        $allOrders = OrderDetail::all();

        $auth = Auth::id();

        return view('livewire.my-orders', ['allOrders'=>$allOrders, 'auth'=>$auth]);
    }
}
