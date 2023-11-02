<div>
    <h2 class="text-2xl font-bold mb-4">Order Summary</h2>
    @auth
    @if($allOrders && count($allOrders) > 0)
        @if($allOrders[0]->id != 0)
            @foreach($allOrders as $allOrder)
               @if($auth == $allOrder->order->user_id && $allOrder->order->user->place_order == 0)
                    <div class="mb-4">
                        <h2 class="text-2xl font-bold mb-4">{{ $allOrder->orderItems->name }}</h2>
                        <p class="text-gray-700 text-sm" style="font-weight:bold; font-size:14px;">QTY: x {{ $allOrder->quantity}}</p>
                        <p class="text-gray-700 text-sm " style="font-weight:bold; font-size:14px;">Price: {{ $allOrder->orderItems->price }}</p>
                        <p class="text-gray-700 text-sm" style="font-weight:bold; font-size:14px; color:red;">Amount:<i class="fa fa-dollar"></i>{{ $allOrder->quantity * $allOrder->orderItems->price}}</p>
                        <p><button 
                                wire:click.prevent="removeCart({{ $allOrder->id}})"
                            ><i class="fa fa-trash"></i></button> | 
                            <button 
                                wire:click.prevent="editCart({{ $allOrder->id }})"
                            ><i class="fa fa-pencil"></i></button></p>
                    </div>
                    @if($isOpen)
                        @include('livewire.add-to-cart')
                    @endif
                @endif
            @endforeach
        @else
            @foreach($orders as $index=>$order)
                <div class="mb-4">
                    <h2 class="text-2xl font-bold mb-4">{{ $order['name']}}</h2>
                    <p class="text-gray-700 text-sm" style="font-weight:bold; font-size:14px;">QTY: x {{ $order['quantity']}}</p>
                    <p class="text-gray-700 text-sm" style="font-weight:bold; font-size:14px;">Price: {{ $order['price']}}</p>
                    <p class="text-gray-700 text-sm" style="font-weight:bold; font-size:14px; color:red;">Amount: <i class="fa fa-dollar"></i> {{ $order['total']}}</p>
                    <p>
                        <button 
                            wire:click.prevent="removeCart({{ $index }})"
                            ><i class="fa fa-trash"></i></button> | 
                        <button 
                            wire:click.prevent="editCart({{ $index }})">
                            <i class="fa fa-pencil"></i></button>
                    </p>
                </div>
        
            @endforeach
        @endif
    @endif
    @endauth
   <hr class="my-4">
     
   <!-- <div class="font-bold text-xl">Total:  ${{ collect($orders)->sum('total') }}</div> -->
    @auth
        @if($auth === $authId && $placeOrder == 0)
        <div class="font-bold text-xl" style="color:green">Total:<i class="fa fa-dollar"></i>{{ $totalAmount }}</div>
      
        <button wire:click.prevent="placeOrder" class="bg-blue-500 text-white font-bold py-2 px-4 mt-4 rounded"><i class="fab fa-first-order"></i> Place Order</button>
        @endif 
    @endauth
    @if($isOpenPlaceOrder)
        @include('livewire.place-order')
    @endif

</div>