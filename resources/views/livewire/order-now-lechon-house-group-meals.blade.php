<div>
    <div class="container mx-auto mt-8 flex">
        <div class="w-1/4 bg-white p-6 rounded shadow">
         @include('livewire.customers-menu')
        </div>
         <!-- Menu Items -->
        <div class="w-3/4 bg-white p-6 rounded shadow mr-4">
            <h2 class="text-2xl font-bold mb-4">Cebu Lechon House - Group Meals</h2>
            <div class="grid grid-cols-2 gap-4">
                @foreach($items as $item)
                <div class="bg-gray-200 p-4 rounded">
                    <h3 class="text-xl font-bold mb-2">{{ $item->name }}</h3>
                    <img width="300px" height="300px" src="{{ asset('storage/images/')}}/{{$item->image}}" alt="{{ $item->name}}">
                    <p class="mt-4">Price: <i class="fas fa-usd"></i>{{ $item->price }} USD</p>
                   
                    <button wire:click="addToCart('{{$item->id}}')" class="bg-green-500 text-white font-bold py-2 px-4 mt-2 rounded">
                    <i class="fas fa-shopping-cart mr-2"></i>Add to Cart</button>
                    @if($isOpen)
                        @include('livewire.add-to-cart', [
                                'foodName'=>$foodName, 
                                'foodPrice'=>$foodPrice,
                                'foodImage'=>$foodImage
                        ])
                    @endif
                   
                </div>
                @endforeach
                
            </div>
        </div>
         <!-- Order Summary -->
        <div class="w-1/4 bg-white p-6 rounded shadow">
            <h2 class="text-2xl font-bold mb-4">Order Summary</h2>

            <!-- Example order items -->
            <div class="mb-4">
                <p>Item 1</p>
                <p class="text-gray-700 text-sm">Quantity: 2</p>
            </div>
            <div class="mb-4">
                <p>Item 2</p>
                <p class="text-gray-700 text-sm">Quantity: 1</p>
            </div>

            <hr class="my-4">

            <div class="font-bold text-xl">Total: $20.00</div>

            <button class="bg-blue-500 text-white font-bold py-2 px-4 mt-4 rounded">Place Order</button>
        </div>
    </div>
</div>
