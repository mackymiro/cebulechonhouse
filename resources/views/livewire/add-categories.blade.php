<div>
<div class="flex">
    <!-- Left Column (Add Category Form) -->
    <div class="w-1/2 bg-white p-4 rounded shadow mr-4">
        <h2 class="text-xl font-semibold mb-4">Add Category</h2>
        @error('categoryName')
            <p class="text-red-500 text-lg mt-2">{{ $message }}</p>
        @enderror
        <form wire:submit.prevent="saveCategory">
            <div class="mb-4">
                <label for="category_name" class="block text-gray-700 font-bold mb-2">Category Name</label>
                <input type="text" wire:model="categoryName" id="category_name" class="w-full px-3 py-2 border rounded" autocomplete="off">
            </div>
            
            <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">Save</button>
        </form>
    
    </div>

    <!-- Right Column (Display Categories) -->
    <div class="w-1/2 bg-white p-4 rounded shadow">
        <h2 class="text-xl font-semibold mb-4">Categories</h2>

        @if($allCategories && count($allCategories) > 0)
            @if($allCategories[0]->id !=0)
                    <ul>
                    @foreach($allCategories as $allCategory)
                            <li>
                                {{ $allCategory->name }}
                                <button wire:click="removeCategories({{ $allCategory->id }})"><i class="fas fa-trash" style="color:red; font-size:20px;"></i></button>
                            </li>

                    @endforeach
                    </ul>
                @else
                <ul>
                @foreach($categories as $index => $category)
                        <li>
                            {{ $category}}
                            <button wire:click="removeCategories({{ $index }})"><i class="fas fa-trash" style="color:red; font-size:20px;"></i></button>
                        </li>

                @endforeach
                </ul>
            @endif
        @endif
    </div>
</div>

</div>