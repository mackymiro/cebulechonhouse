<div>
    <div class="container mx-auto mt-8 flex">
        <div class="w-1/4 bg-white p-6 rounded shadow">
            @include('livewire.customers-menu-kitchen-house')
        </div>
        <!-- Menu Items -->
        <div class="w-3/4 bg-white p-6 rounded shadow mr-4">
            <h2 class="text-2xl font-bold mb-4">Chinese Kitchen Menu</h2>

            <!-- Example menu items -->
            <div class="grid grid-cols-2 gap-4">
                @foreach($itemsChineses as $itemsChinese)
                <div class="bg-gray-200 p-4 rounded">
                    <h3 class="text-xl font-bold mb-2">{{ $itemsChinese->name }}</h3>
                    <img width="300px" height="300px" src="{{ asset('storage/images/')}}/{{$itemsChinese->image}}" alt="{{ $itemsChinese->name}}">
                    <p class="mt-4">Price: <i class="fas fa-usd"></i>{{ $itemsChinese->price }} USD</p>
                   
                    <button wire:click="addToCart('{{$itemsChinese->id}}')" class="bg-green-500 text-white font-bold py-2 px-4 mt-2 rounded">
                    <i class="fas fa-shopping-cart mr-2"></i>Add to Cart</button>
                    @if($isOpen)
                        @include('livewire.add-to-cart', [
                                'foodId'=>$foodId,
                                'foodName'=>$foodName, 
                                'foodPrice'=>$foodPrice,
                                'foodImage'=>$foodImage,
                                'editCard'=>$editCard,
                        ])
                    @endif
                   
                </div>
                @endforeach
            </div>
        </div>

        <!-- Order Summary -->
        <div class="w-1/4 bg-white p-6 rounded shadow">
            @include('livewire.order-summary', ['orderFoodName'=>$orderFoodName, 'qty'=>$qty])
        </div>
    </div>
</div>