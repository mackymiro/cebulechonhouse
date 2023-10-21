<div>
    <div class="flex">
        <!-- Box 1 -->
        <div class="bg-white rounded-lg shadow-lg p-6 m-4 w-1/2">
            <a href="{{ url('admin/menu/meals') }}" wire:navigate>
            <h2 class="text-xl font-semibold mb-4">Meals</h2>
            </a>
        </div>
    
        <!-- Box 2 -->
        <div class="bg-white rounded-lg shadow-lg p-6 m-4 w-1/2">
            <a href="{{ url('admin/menu/ala-carte') }}" wire:navigate> 
                <h2 class="text-xl font-semibold mb-4">Ala Carte</h2>
            </a>
        </div>
        
        
    </div>
    <div class="flex">
        <!-- Box 1 -->
        <div class="bg-white rounded-lg shadow-lg p-6 m-4 w-1/2">
            <a href="{{ url('admin/menu/group-meals') }}" wire:navigate>
            <h2 class="text-xl font-semibold mb-4">Group Meals</h2>
            </a>
        </div>
    
        <!-- Box 2 -->
        <div class="bg-white rounded-lg shadow-lg p-6 m-4 w-1/2">
        <a href="{{ url('admin/menu/desserts') }}" wire:navigate> 
                <h2 class="text-xl font-semibold mb-4">Desserts</h2>
        </a>
        </div>
        
        
    </div>
    <div class="flex">
        <!-- Box 1 -->
        <div class="bg-white rounded-lg shadow-lg p-6 m-4 w-1/2">
            <a href="{{ url('admin/menu/beverages') }}" wire:navigate>
                <h2 class="text-xl font-semibold mb-4">Beverages</h2>
            </a>
        </div>
        
    </div>
</div>
