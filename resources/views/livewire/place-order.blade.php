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
                                <h1>Your Orders </h1><i style="color:red;">Note* ALL ORDERS IS CASH ON DELIVERY</i>
                                <table class="md:table-fixed">
                                <thead>
                                    <tr>
                                    <th width="60%">Food</th>
                                    <th>Qty</th>
                                    <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach($allOrders as $allOrder)
                                       @if($auth == $allOrder->order->user_id)
                                        <tr>
                                            <td>{{ $allOrder->orderItems->name }}</td>
                                            <td>x{{ $allOrder->quantity}}</td>
                                            <td><i class="fa fa-dollar"></i> {{ $allOrder->quantity * $allOrder->orderItems->price}}</td>
                                        </tr>
                                        @endif
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td>Total Amount: </td>
                                        <td><i class="fa fa-dollar"></i> {{ $totalAmount }}</td>
                                    </tr>
                                </tbody>
                                </table>
                                @error('address')
                                    <p class="text-red-500 text-lg mt-2">{{ $message }}</p>
                                @enderror
                                <input type="text" placeholder="Enter address here for delivery: " wire:model="address" class="w-full px-3 py-2 border rounded"/>
                            </div>
                            <button 
                                wire:click.prevent="closeModalPlaceOrder" 
                                type="button" class="bg-red-500 text-white px-4 py-2 rounded-full ml-2">
                                Cancel
                            </button>
                            <button 
                                wire:click.prevent="submitOrder" 
                                type="button" class="bg-green-500 text-white px-4 py-2 rounded-full ml-2">
                                Submit Order
                            </button>
                    </div>
                </div>           
            </div>
        </div>
    </div>
</div>