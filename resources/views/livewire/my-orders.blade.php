<div>
    <div class="flex justify-center items-center w-full">
        <div class="bg-white p-6 border border-gray-300 rounded shadow-md">
            <h1 class="text-3xl font-bold mb-2">My Orders</h1>
            <table class="w-full mt-4 border-collapse border border-gray-300">
                <thead>
                    <tr>
                        
                        <th class="py-2 px-4 border">Food Name</th>
                        <th class="py-2 px-4 border">Quantity</th>
                        <th class="py-2 px-4 border">Price </th>
                        <th class="py-2 px-4 border">Total Amount </th>
                    </tr>
                </thead>
                <tbody>
                    Order date: @php  echo date('Y-m-d'); @endphp
                    @foreach($allOrders as $allOrder)
                        @if($auth == $allOrder->order->user_id && $allOrder->current_timestamps != NULL)
                            @php
                                $date = date('Y-m-d', $allOrder->current_timestamps);
                                $currentDate = date('Y-m-d');
                            @endphp
                            @if($currentDate == $date)
                            <tr>
                                <td class="py-2 px-4 border">{{ $allOrder->orderItems->name}}</td>
                                <td class="py-2 px-4 border">{{ $allOrder->quantity}}</td>
                                <td class="py-2 px-4 border"><i class="fa fa-dollar"></i>{{ $allOrder->orderItems->price }}</td>
                                <td class="py-2 px-4 border"><i class="fa fa-dollar"></i>{{ $allOrder->quantity * $allOrder->orderItems->price}}</td>

                            </tr>
                            @endif
                        @endif
                   @endforeach
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
    </div>
</div>
