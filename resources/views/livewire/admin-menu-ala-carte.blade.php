<div>
    <h1 class="text-2xl font-bold mb-4">Cebu Lechon House - Ala Carte</h1>
    @foreach($items as $item)
    <div class="container mx-auto p-4 bg-white shadow-lg rounded-lg">
       

        <!-- Example Food Item -->
        <div class="flex items-center mb-4">
            <!-- Food Image -->
            <img src="{{ asset('storage/images/')}}/{{$item->image}}" alt="{{ $item->name }}" class="w-16 h-16 rounded-full mr-4">

            <!-- Food Details -->
            <div>
                <h2 class="text-xl font-semibold">{{ $item->name }}</h2>
                <p class="text-gray-700">${{ $item->price }}</p>
            </div>
            
            <!-- Edit and Delete Buttons -->
            <div class="ml-auto">
                <button wire:click="editMeals({{ $item->id }})"class="bg-green-500 text-white px-4 py-2 rounded-full">Edit</button>
                <button wire:click="deleteMeals({{ $item->id }}) "class="bg-red-500 text-white px-4 py-2 rounded-full ml-2">Delete</button>
            </div>
            @if($isOpen)
                @include('livewire.admin-modal-edit',
                 [
                    'updateId'=>$updateId,
                    'updateName'=>$updateName, 
                    'updatePrice'=>$updatePrice,
                    'updateImage'=>$updateImage
                ])
                
            @endif

            @if($isOpenDelete)
                 @include('livewire.admin-modal-delete', ['deleteId'=>$deleteId])

            @endif
           
        </div>

        <!-- Add more food items as needed -->
        
    </div>
     <!-- Add a margin-bottom of 8 units (you can adjust this as needed) -->
    <div class="mb-8"></div>
    @endforeach

    <h1 class="text-2xl font-bold mb-4">New Chinese Kitchen - Ala Carte</h1>
    @foreach($itemsChineses as $itemsChinese)
    <div class="container mx-auto p-4 bg-white shadow-lg rounded-lg">
       

        <!-- Example Food Item -->
        <div class="flex items-center mb-4">
            <!-- Food Image -->
            <img src="{{ asset('storage/images/')}}/{{$itemsChinese->image}}" alt="{{ $itemsChinese->name }}" class="w-16 h-16 rounded-full mr-4">

            <!-- Food Details -->
            <div>
                <h2 class="text-xl font-semibold">{{ $itemsChinese->name }}</h2>
                <p class="text-gray-700">${{ $itemsChinese->price }}</p>
            </div>
            
            <!-- Edit and Delete Buttons -->
            <div class="ml-auto">
                <button wire:click="editMeals({{ $itemsChinese->id }})"class="bg-green-500 text-white px-4 py-2 rounded-full">Edit</button>
                <button wire:click="deleteMeals({{ $itemsChinese->id }}) "class="bg-red-500 text-white px-4 py-2 rounded-full ml-2">Delete</button>
            </div>
            @if($isOpen)
                @include('livewire.admin-modal-edit',
                 [
                    'updateId'=>$updateId,
                    'updateName'=>$updateName, 
                    'updatePrice'=>$updatePrice,
                    'updateImage'=>$updateImage
                ])
                
            @endif

            @if($isOpenDelete)
                 @include('livewire.admin-modal-delete', ['deleteId'=>$deleteId])

            @endif
           
        </div>

        <!-- Add more food items as needed -->
        
    </div>
     <!-- Add a margin-bottom of 8 units (you can adjust this as needed) -->
    <div class="mb-8"></div>
    @endforeach


</div>


