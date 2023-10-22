<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Item;

class OrderNowLechonHouseBeverages extends Component
{

    public $isOpen = 0;
    public $foodName;
    public $foodPrice;
    public $foodImage;
    public $number = 1;

    public function closeModal(){
        $this->isOpen = false;
    }

    public function openModal(){
        $this->isOpen = true;
    }

    public function addToCart($id){
        $foodItems = Item::find($id);
        $this->foodName = $foodItems->name;
        $this->foodPrice = $foodItems->price;
        $this->foodImage = $foodItems->image;
    
        $this->openModal();
    }

    public function render(){
        $items = Item::orderBy('id', 'desc')
                ->where('category_id', 5)
                ->get();
        return view('livewire.order-now-lechon-house-beverages', ['items'=>$items]);
    }
}
