<div>
    <h2 class="text-2xl font-bold mb-4">Order Summary</h2>
    @auth
    @if($allOrders && count($allOrders) > 0)
        @if($allOrders[0]->id != 0)
            @foreach($allOrders as $allOrder)
                <div class="mb-4">
                    <p>{{ $allOrder->orderItems->name }}</p>
                    <p class="text-gray-700 text-sm">QTY: x {{ $allOrder->quantity}}</p>
                    <p class="text-gray-700 text-sm">Price: {{ $allOrder->orderItems->price }}</p>
                    <p class="text-gray-700 text-sm">Amount: {{ $allOrder->quantity * $allOrder->orderItems->price}}</p>
                    <p><button 
                            wire:click.prevent="removeCart({{ $allOrder->id}})"
                        >Remove</button> | 
                        <button 
                            wire:click.prevent="editCart({{ $allOrder->id }})"
                        >Edit</button></p>
                </div>

            @endforeach
        @else
            @foreach($orders as $index=>$order)
                <div class="mb-4">
                    <p>{{ $order['name']}}</p>
                    <p class="text-gray-700 text-sm">QTY: x {{ $order['quantity']}}</p>
                    <p class="text-gray-700 text-sm">Price: {{ $order['price']}}</p>
                    <p class="text-gray-700 text-sm">Amount: {{ $order['total']}}</p>
                    <p>
                        <button 
                            wire:click.prevent="removeCart({{ $index }})"
                            >Remove</button> | 
                        <button 
                            wire:click.prevent="editCart({{ $index }})">
                            Edit</button>
                    </p>
                </div>
        
            @endforeach
        @endif
    @endif
    @endauth
   <hr class="my-4">
     
   <!-- <div class="font-bold text-xl">Total:  ${{ collect($orders)->sum('total') }}</div> -->
    @auth
    <div class="font-bold text-xl">Total: {{ $totalAmount }}</div>
    @endauth

    <button class="bg-blue-500 text-white font-bold py-2 px-4 mt-4 rounded">Place Order</button>
</div>