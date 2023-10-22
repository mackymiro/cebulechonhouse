<div>
    <section class="container mx-auto mt-8 text-center">
        <h2 class="text-4xl font-bold mb-4">Welcome to Cebu Lechon House</h2>
        <p class="text-lg mb-8">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <img src="banner-image.jpg" alt="Banner Image" class="mx-auto rounded-lg">
       
    </section>

    <section class="container mx-auto mt-8 flex justify-center">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white p-6 rounded shadow text-center">
                <h2 class="text-2xl font-bold mb-4">Cebu Lechon House</h2>
                <a href="{{ url('order-now/lechon-house') }}" wire:navigate class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 mt-4 rounded">
                <i class="fas fa-shopping-cart mr-2"></i>Order Now</a>
            </div>

            <div class="bg-white p-6 rounded shadow text-center">
                <h2 class="text-2xl font-bold mb-4">New Chinese Kitchen</h2>
                <a href="{{ url('order-now/chinese-kitchen') }}" wire:navigate class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 mt-4 rounded">
                <i class="fas fa-shopping-cart mr-2"></i>Order Now</a>
            </div>
        </div>
        
    </section>
    
 
</div>