<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\TotalOrder;
use Auth;
use Livewire\Attributes\Rule;
use App\Models\User;

class OrderNowLechonHouseBeverages extends Component
{

    public $isOpen = 0;
    public $isOpenPlaceOrder = 0;
    public $foodId;
    public $foodName;
    public $foodPrice;
    public $foodImage;
    public $number = 1;
    public $orders =[];
    public $orderFoodName;
    public $qty;
    public $totalAmount;
    public $editCard;

    #[Rule('required')]
    public $address;

    public function submitOrder(){
        $this->validate();
 
        $authId = Auth::id();
 
        $allOrders = OrderDetail::all();
        foreach($allOrders as $allOrder){
           if($authId == $allOrder->order->user_id){
                 $allOrder->update(['current_timestamps'=>time()]);
           }
        }
 
       User::updateOrCreate(['id'=>Auth::id()], [
            'address'=>$this->address,
        ]);
 
 
        return $this->redirect('/my-orders', navigate: true);
    }

    public function closeModalPlaceOrder(){
        $this->isOpenPlaceOrder = false;
    }

    public function placeOrder(){
       
        $this->openModalPlaceOrder();
    }

    public function updateOrder($id){
        $getOrderDetail = OrderDetail::find($id);

        //get the item table
        $getItem = Item::find($getOrderDetail->item_id);
        //dd($getItem->price, $this->number);
        $getPrice = $getItem->price * $this->number;
        //dd($getPrice);

        OrderDetail::updateOrCreate(['id'=>$id],[
            'quantity'=>$this->number,
        ]);

        TotalOrder::updateOrCreate(['order_details_id'=>$id],[
           'total_amount'=>$getPrice,
        ]);

        return $this->redirect('/order-now/lechon-house/beverages', navigate: true);

    }      

    public function plsLogin(){
        return $this->redirect('/register', navigate: true);
    }


    public function editCart($id){
        $this->editCard = 'edit';
    
        $editCartOrderDetail = OrderDetail::find($id);
      
        $editItem = Item::find($editCartOrderDetail->item_id);
      
        $this->foodName = $editItem->name;
        $this->foodPrice = $editItem->price;
        $this->foodImage = $editItem->image;
        $this->foodId = $editCartOrderDetail->id;
        $this->number = $editCartOrderDetail->quantity;

        $this->openModal();
    }

    public function removeCart($index){
        $id = $index;
        $deleteOrderDetail = OrderDetail::find($id);
       
        // Step 1: Find and delete TotalOrder records
        $deleteTotalOrder = TotalOrder::where('order_details_id', $deleteOrderDetail->id);
        $deleteTotalOrder->delete();
        
         // Step 2: Find and delete OrderDetail record
        $deleteOrders = OrderDetail::where('order_id', $deleteOrderDetail->id);
        $deleteOrders->delete();

         // Step 3: Find and delete Order records
        $deleteOrder = Order::where('id', $deleteOrderDetail->order_id);
        $deleteOrder->delete();

        unset($this->orders[$index]);
    }


    public function addOrder($id){
        $this->editCard = false;
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

    
    public function openModalPlaceOrder(){
        $this->isOpenPlaceOrder = true;
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
                ->where('category_id', 5)
                ->where('restaurant', 1)
                ->get();

        $allOrders = OrderDetail::all();

        $auth = Auth::id();
        
        foreach($allOrders as $orders){
            $authId = $orders->order->user_id;
            $currentTimestamps = $orders->current_timestamps;
        }

        if(count($allOrders) == 0){
            $authId = Auth::id();
        }
      
        if(count($allOrders) != 0){
            if(Auth::id()){
                $this->totalAmount = $allOrders->where('current_timestamps', NULL)->sum(function($order) {
                    return $order->quantity * $order->orderItems->price;
                });
            } 
        }

        
        return view('livewire.order-now-lechon-house-beverages', [
            'items'=>$items, 
            'allOrders'=>$allOrders, 
            'auth'=>$auth, 
            'authId'=>$authId,
            'currentTimestamps'=>$currentTimestamps]);
    }
}
