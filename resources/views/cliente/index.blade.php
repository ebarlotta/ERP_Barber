<div>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav">
            <li><a href="">Empresa</a></li>
            <li>
                <a href="">VICENTE BARLOTTA</a>
            </li>
            <li><a href="./index.php">LOGOUT</a></li>
            <li><a style="text-decoration:none;" href=""><b>C L I E N T E S</b></a></li>
        </ul>
    </div>
</div>
</nav> --}}
    <title>Agregar Clientes</title>

    <div class="alert alert-danger">
        <label ng-model="Mensajes" class="ng-pristine ng-untouched ng-valid ng-binding ng-empty"></label>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            <table class="w-full">
                <thead class="bg-gray-100">
                    <tr>
                        <td class="w-full">Nombre Cliente</td>
                        <td class="w-full">Cuit</td>
                        <td class="w-full">Dirección</td>
                        <td class="w-full">Teléfono</td>
                        <td class="w-full">Opciones</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                        <tr>
                            <td class="border px-4 py-2  bg-red-600">{{ $cliente->name }}</td>
                            <td class="border px-4 py-2">{{ $cliente->cuit }}</td>
                            <td class="border px-4 py-2">{{ $cliente->direccion }}</td>
                            <td class="border px-4 py-2">{{ $cliente->telefono }} </td>
                            <td class="border px-4 py-2">
                                <div class="flex justify-center">
                                    <!-- Editar  -->
                                    <x-editar id=""></x-editar>
                                    <!-- Eliminar -->
                                    <x-eliminar id=""></x-eliminar>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    </body>
</div>
