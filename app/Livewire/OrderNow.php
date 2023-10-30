<?php

namespace App\Livewire;


use Livewire\Component;
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\TotalOrder;
use Auth;

class OrderNow extends Component
{
    public $isOpen = 0;
    public $foodId;
    public $foodName;
    public $foodPrice;
    public $foodImage;
    public $number = 1;
    public $numberSelect = 1;
    public $orders =[];
    public $orderFoodName;
    public $qty;
    public $number1;
    public $totalAmount;
   

    public function plsLogin(){
        return $this->redirect('/register', navigate: true);
    }

    public function editCart($id){
        
        $this->openModal();
    }

    public function removeCart($index){
        $id = $index;
        $deleteOrderDetail = OrderDetail::find($id);
       
        // Step 1: Find and delete TotalOrder records
        $deleteTotalOrder = TotalOrder::where('order_details_id', $deleteOrderDetail->id);
        $deleteTotalOrder->delete();
        
         // Step 2: Find and delete OrderDetail record
        $deleteOrderDetail = OrderDetail::where('order_id', $deleteOrderDetail->id);
        $deleteOrderDetail->delete();

         // Step 3: Find and delete Order records
        $deleteOrder = Order::where('user_id', Auth::id());
        $deleteOrder->delete();

        unset($this->orders[$index]);
    }

    public function addOrder($id){
        $foodItems = Item::find($id);
        $this->orderFoodName = $foodItems->name;
        //dd($foodItems->price, $this->number++);
        $totalAmount = $foodItems->price * $this->number++;
        $qty = $this->number++ -1;

        $order = [
            'name' =>$foodItems->name,
            'quantity' =>$qty,
            'price' =>$foodItems->price,
            'total' =>$totalAmount
        ];

        $this->orders[] = $order;

        //save database
        $newOrder = Order::create([
            'user_id' => Auth::id()
        ]);
       
        $newOrderDetails = OrderDetail::create([
            'item_id' => $foodItems->id,
            'order_id' =>$newOrder->id,
            'quantity' =>$qty,
            
        ]);

     
        TotalOrder::Create([
            'order_details_id' => $newOrderDetails->id,
            'total_amount' =>$totalAmount,
        ]);
       


       
        $this->closeModal();        
    }

    public function decrement(){
        $this->number--;
    }

    public function increment(){
        $this->number++;
    }

    public function closeModal(){
        $this->number = 1;
        $this->isOpen = false;
    }

    public function openModal(){
        $this->isOpen = true;
    }

    public function addToCart($id){
        $foodItems = Item::find($id);
        $this->foodId = $foodItems->id;
        $this->foodName = $foodItems->name;
        $this->foodPrice = $foodItems->price;
        $this->foodImage = $foodItems->image;
    
        $this->openModal();
    }

   

    public function render(){
        $items = Item::orderBy('id', 'desc')
                ->where('category_id', 1)
                ->get();

        $allOrders = OrderDetail::all();

        $this->totalAmount = $allOrders->sum(function($order) {
            return $order->quantity * $order->orderItems->price;
        });

        return view('livewire.order-now', ['items'=>$items, 'allOrders'=>$allOrders]);
    }
}
