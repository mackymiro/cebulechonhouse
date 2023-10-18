<div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <div class="w-full h-full bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-xl font-semibold mb-4">Add Meals</h2>
        @if(session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative animate__animated animate__fadeIn" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('message') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <title>Close</title>
                    <path d="M6.293 6.293a1 1 0 011.414 0L10 8.586l2.293-2.293a1 1 0 111.414 1.414L11.414 10l2.293 2.293a1 1 0 11-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 01-1.414-1.414L8.586 10 6.293 7.707a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path>
                </svg>
            </span>
        </div>
        @endif
        <form wire:submit.prevent="addMeals">
          
            <div class="mb-4">
                <select wire:model="categories" class="w-full px-3 py-2 border rounded">
                    @foreach($allCategories as $key=>$allCategory)
                        <option value="{{ $allCategory->id}}">{{ $allCategory->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('nameOfFood')
                <p class="text-red-500 text-lg mt-2">{{ $message }}</p>
            @enderror
            <div class="mb-4">
                <label for="foodName" class="block text-gray-700 font-bold mb-2">Name of Food</label>
                <input type="text" wire:model="nameOfFood"  class="w-full px-3 py-2 border rounded" autocomplete="off">
         
            </div>
          
            @error('price')
                <p class="text-red-500 text-lg mt-2">{{ $message }}</p>
            @enderror
            <div class="mb-4">
                <label for="price" class="block text-gray-700 font-bold mb-2">Price</label>
                <input type="text" wire:model="price"  class="w-full px-3 py-2 border rounded" autocomplete="off">
         
            </div>
            @error('uploadPhoto')
                <p class="text-red-500 text-lg mt-2">{{ $message }}</p>
            @enderror
            <div class="mb-4">
                <label for="uploadPhoto" class="block text-gray-700 font-bold mb-2">Photo</label>
                <input type="file" wire:model="uploadPhoto"  id="uploadPhoto" class="w-full px-3 py-2 border rounded" autocomplete="off">
         
            </div>
            <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">Save</button>
     
        </form>
    </div>
    
</div>
