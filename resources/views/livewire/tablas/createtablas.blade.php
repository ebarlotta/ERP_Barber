<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center mt-24 pt-4 px-4 pb-20 text-center sm:block sm:p-0" style="background-color: beige; ">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle "></span>
        <div class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-1 sm:align-top sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2 ml-1">Informes</label>
                        @if($user_id<>0)
                            <div class="mb-4 flex">
                                @foreach ($ListadeTablas as $item)
                                    <div class="flex">
                                    @if($item->valor )
                                        <div class="shadow-md m-1 flex" style="font-size: 18px; background-color: rgb(226, 230, 230); border-radius: 10px; padding: 8px; height: 45px;">{{ $item->name }}<img src="{{ asset('images/activo.jpg') }}" style="width: 30px;height: 20px;margin: 5px 10px 0px 12px; padding-right: 10px;"></div>
                                    @else
                                        <div class="shadow-md m-1 flex" style="font-size: 18px; background-color: rgb(226, 230, 230); border-radius: 10px; padding: 8px; height: 45px;">{{ $item->name }}<img src="{{ asset('images/pasivo.jpg') }}" style="width: 30px;height: 20px;margin: 5px 10px 0px 12px; padding-right: 10px;"></div>
                                    @endif
                                    </div>
                                @endforeach
                            </div>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Ingrese Descripcion" wire:model="name">
                            @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
                        @else
                            Debe seleccionar primero un usuario
                        @endif
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    @if($user_id<>0)
                        <x-guardar></x-guardar>
                    @endif
                    <x-cerrar></x-cerrar>
                </div>
            </form>
        </div>
    </div>
</div>