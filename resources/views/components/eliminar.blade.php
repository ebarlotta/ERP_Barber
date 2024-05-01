@props(['id'])
<div class="flex justify-center">
    <!-- Desde 640 en adelante -->
    <button wire:click="delete({{$id}})" class="hidden lg:flex bg-red-300 hover:bg-red-400 text-black-900 font-bold py-2 px-4 rounded mt-1w">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
        Eliminar
    </button>
    <!-- Menos 640 en adelante -->
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    <button wire:click="delete({{$id}})" class="sm:hidden flex bg-red-300 hover:bg-red-400 text-black-900 font-bold py-2 px-4 rounded mt-1">
=======
    <button wire:click="delete({{$id}})" class="sm:hidden flex bg-red-300 hover:bg-red-400 text-black-900 font-bold py-1 px-1 rounded mt-1">
>>>>>>> 8a1afa81658c927b270153e13b6d49f04e24d163
=======
    <button wire:click="delete({{$id}})" class="lg:hidden flex bg-red-300 hover:bg-red-400 text-black-900 font-bold py-1 px-1 rounded mt-1">
>>>>>>> sandbox
=======
    <button wire:click="delete({{$id}})" class="sm:hidden flex bg-red-300 hover:bg-red-400 text-black-900 font-bold py-2 px-4 rounded mt-1">
=======
    <button wire:click="delete({{$id}})" class="sm:hidden flex bg-red-300 hover:bg-red-400 text-black-900 font-bold py-1 px-1 rounded mt-1">
>>>>>>> f7b4677012a3b7fdee8c490bea21faab66a3ad1a
>>>>>>> 3284121bdc4b0dd60eb6a642758556cf07da7e52
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
</div>