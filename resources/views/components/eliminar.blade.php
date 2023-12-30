@props(['id'])
<div class="flex justify-center">
    <!-- Desde 640 en adelante -->
    <button wire:click="delete({{$id}})" class="hidden sm:flex bg-red-300 hover:bg-red-400 text-black-900 font-bold py-2 px-4 rounded mt-1w">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
        Eliminar
    </button>
    <!-- Menos 640 en adelante -->
<<<<<<< HEAD
    <button wire:click="delete({{$id}})" class="sm:hidden flex bg-red-300 hover:bg-red-400 text-black-900 font-bold py-2 px-4 rounded mt-1">
=======
    <button wire:click="delete({{$id}})" class="sm:hidden flex bg-red-300 hover:bg-red-400 text-black-900 font-bold py-1 px-1 rounded mt-1">
>>>>>>> f7b4677012a3b7fdee8c490bea21faab66a3ad1a
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
</div>