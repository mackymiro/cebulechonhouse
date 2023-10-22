<div>
    <h1 class="text-2xl font-bold mb-4">User Settings</h1>
    <div class="container mx-auto p-4 bg-white shadow-lg rounded-lg">
        @if(session()->has('message'))
            <div class="font-medium text-sm text-green-800">
                {{ session('message') }}
            </div>
        @endif
        <form wire:submit.prevent="addAdmin">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-bold mb-2">Email Address</label>
                <input type="email"  wire:model="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            @error('email')
                <p class="text-red-500 text-lg mt-2">{{ $message }}</p>
            @enderror
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-bold mb-2">Password</label>
                <input type="password"  wire:model="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            @error('password')
                <p class="text-red-500 text-lg mt-2">{{ $message }}</p>
            @enderror
            <div class="flex float left justify-center">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
            </div>
        </form>
    </div>
      <!-- Add a margin-bottom of 8 units (you can adjust this as needed) -->
      <div class="mb-8"></div>
      <h1 class="text-2xl font-bold mb-4">Admin Lists</h1>
<div class="container mx-auto p-4 bg-white shadow-lg rounded-lg">
    <table class="min-w-full border-collapse border border-gray-300">
        <thead>
            <tr>
                <th class="border border-gray-300 p-2">Email Address</th>
                <th class="border border-gray-300 p-2">Password</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td class="border border-gray-300 p-2">{{ $user->email }}</td>
                <td class="border border-gray-300 p-2">{{ $user->password }}</td>
                
            </tr>
            @endforeach
            <!-- Add more rows as needed -->
        </tbody>
    </table>
</div>


</div>
