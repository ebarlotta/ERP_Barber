<h1>
   esta es una prueba
</h1>

        <table class="mt-6">
            <tr class="bg-blue-200 border border-blue-500">
                <td class="center">Nombre</td>
                <td class="center">Deuda</td>
            </tr>
        @foreach($registros as $registro) {

            <tr>
                <td class="bg-gray-100 border border-blue-500">{{ $registro->name }}</td>
                <td class="bg-gray-100 border border-blue-500 text-right">{{ $registro->Saldo }}</td>
            </tr>
            
        @endforeach
            <tr class="bg-green-500">
                <td class="colspan-2">Total Deuda a Proveedores</td>
                <td>
                    Total {{ $saldo }}
                </td>
            </tr>
            </table>