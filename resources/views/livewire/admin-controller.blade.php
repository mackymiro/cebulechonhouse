<x-guest-layout>
    <x-authentication-card-admin>
        <x-slot name="logo">
            <!-- <x-authentication-card-logo /> -->
            <p style="font-size:40px; font-weight:bold;">ADMIN LOGIN</p>
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form wire:submit.prevent="loginForm">
            @csrf
            <div class="col-span-12">
                <label for="email" class="block font-semibold mb-1">Email</label>
                <input type="email" name="email" id="email" wire:model="email" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-500" />
            </div>
            <div class="col-span-12">
                <label for="password" class="block font-semibold mb-1">Password</label>
                <input type="password" name="password" id="password" wire:model="password" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-500" />
            </div>


            <div class="flex items-center justify-end mt-4">
           

                <x-button class="ml-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card-admin>
</x-guest-layout>
