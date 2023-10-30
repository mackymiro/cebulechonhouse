<div>
    <div id="modal" class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <!-- This element is to trick the browser into centering the modal contents. -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
               
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="">
                            <div class="mb-4">
                                <h1>{{ $foodName }}</h1>
                                <img src="{{ asset('storage/images/')}}/{{ $foodImage }}" alt="{{ $foodImage }}" class="object-contain w-150 h-80 mr-4">
                                <h1>Price</h1>
                                <p><i class="fas fa-usd"></i> {{ $foodPrice }} USD</p>
                                <div class="flex items-center">
                                    <button 
                                        wire:click.prevent="decrement" 
                                        type="button"
                                        class="px-2 py-1 bg-blue-500 text-white rounded-l" 
                                        id="decrement"
                                       @if($number ==1) disabled @endif>-
                                    </button>&nbsp;
                                    <input @if($number ==1) disabled @endif type="text" class="w-10 text-center border border-gray-300" id="quantity" wire:model="number">&nbsp;
                                    <button 
                                        wire:click.prevent="increment" 
                                        type="button"
                                        class="px-2 py-1 bg-blue-500 text-white rounded-r" >
                                        +
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                            @auth
                            <button 
                                wire:click.prevent="addOrder('{{ $foodId }}')" 
                                type="button" 
                                class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                <i class="fas fa-shopping-cart mr-2"></i> Add Order
                            </button>

                            @else
                            <button 
                                wire:click.prevent="plsLogin" 
                                type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                <i class="fas fa-shopping-cart mr-2"></i> Add Order
                            </button>
                            @endauth
                        </span>
                        <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                            <button 
                                wire:click="closeModal()" 
                                type="button" class="bg-red-500 text-white px-4 py-2 rounded-full ml-2">
                                Cancel
                            </button>

                        </span>
                    </div>
               
            </div>
        </div>
    </div>
</div>
