<div x-data="{ showMessage: true }">
    @auth
        <button wire:click="bookProperty" class="mt-4 block w-full bg-primary text-white py-2 rounded">
            Réserver
        </button>
    @endauth

    @if (session()->has('message'))
        <div x-show="showMessage" x-init="setTimeout(() => showMessage = false, 3000)"
            class="bg-green-500 text-white p-2 rounded mt-2">
            {{ session('message') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div x-show="showMessage" x-init="setTimeout(() => showMessage = false, 3000)"
            class="bg-red-500 text-white p-2 rounded mt-2">
            {{ session('error') }}
        </div>
    @endif
</div>
