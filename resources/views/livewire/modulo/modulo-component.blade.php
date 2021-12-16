<div>
    <div class="sm:block md:hidden lg:hidden xl:hidden">
        <div class="text-left" style="font-size: 15px; margin: 12px;">
            @foreach ($modulos as $modulo)
                <a href="{{ route($modulo->pagina) }}" class="flex mb-2 transform transition duration-500 hover:scale-105 shadow ">
                    <div style="width:20%">
                        <img class="rounded-l-md w-full w-36 h-36" src="{{ asset('images/'. $modulo->imagen) }}" style="width:100%; height:100%;" >
                    </div>
                    <div class="rounded-r-md" style="background:linear-gradient(90deg, lightblue 20%, white 50%); width:100%;">
                        <p class="ml-3">
                            {{ $modulo->name }}
                        </p>
                        <p class="ml-3 mr-1 text-xs" style="font-size: 12px">
                            {{ $modulo->leyenda }}
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    {{-- Modo Escritorio --}}
    <div class="hidden sm:hidden md:block lg:block xl:block">
        <div class="hidden sm:hidden md:block lg:block xl:block  mb-4 mr-2 text-left mt-6" style=" display: flex; flex-wrap: wrap; width: 100%; justify-content: center;">
        @foreach ($modulos as $modulo)
            <a href="{{ route($modulo->pagina) }}" class="rounded-l-md flex mb-2 mt-2 transform transition duration-500 hover:scale-105" style="width:45%; margin-right: 5px; margin-left: 5px;">
                <div style="display:flex; box-shadow: 10px 5px 5px gray">
                {{-- <div class="flex mb-2 mt-2 transform transition duration-500 hover:scale-105 shadow  " style="width:40%; margin-right: 5px; margin-left: 5px"> --}}
                    <div style="width:33%">
                        <img class="rounded-l-md w-full w-36 h-36" src="{{ asset('images/'. $modulo->imagen) }}" style="width:100%; height:100%;" >
                    </div>
                    <div class="rounded-r-md" style="background:linear-gradient(90deg, lightblue 20%, white 50%); width:66%; height:100px;">   <!-- background:linear-gradient(90deg, lightblue 40%, white 60%); background:linear-gradient(d贸nde empieza, color1, 40%, color2, 60%); -->
                        <p class="ml-3" style="font-size: 18px">
                            {{ $modulo->name }}
                        </p>
                        <p class="ml-3 mr-1" style="font-size: 12px">
                            {{ $modulo->leyenda }}
                        </p>
                    </div>
                {{-- </div><br> --}}
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>
