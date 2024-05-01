@props(['id'])
<div class="flex justify-center">
    <!-- Desde 640 en adelante -->
    <button wire:click="edit({{$id}})" class="hidden lg:flex bg-blue-300 hover:bg-blue-400 text-black-900 font-bold py-2 px-4 mr-2 rounded">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
        </svg>
        Editar
    </button>
    <!-- Menos 640 en adelante -->
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    <button wire:click="edit({{$id}})" class="sm:hidden bg-blue-300 hover:bg-blue-400 text-black-900 font-bold py-2 px-4 rounded">
=======
    <button wire:click="edit({{$id}})" class="sm:hidden bg-blue-300 hover:bg-blue-400 text-black-900 font-bold py-1 px-1 mt-1 rounded">
>>>>>>> 8a1afa81658c927b270153e13b6d49f04e24d163
=======
    <button wire:click="edit({{$id}})" class="lg:hidden bg-blue-300 hover:bg-blue-400 text-black-900 font-bold py-1 px-1 mt-1 rounded">
>>>>>>> sandbox
=======
    <button wire:click="edit({{$id}})" class="sm:hidden bg-blue-300 hover:bg-blue-400 text-black-900 font-bold py-2 px-4 rounded">
=======
    <button wire:click="edit({{$id}})" class="sm:hidden bg-blue-300 hover:bg-blue-400 text-black-900 font-bold py-1 px-1 mt-1 rounded">
>>>>>>> f7b4677012a3b7fdee8c490bea21faab66a3ad1a
>>>>>>> 3284121bdc4b0dd60eb6a642758556cf07da7e52
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
        </svg>
    </button>
</div>