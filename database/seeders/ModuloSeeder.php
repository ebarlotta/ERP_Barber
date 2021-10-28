<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
class ModuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modulos')->insert(['name'=>'Clientes','pagina'=>'clientes', 'imagen'=>'small_cliente.jpg', 'leyenda'=>'']);
        DB::table('modulos')->insert(['name'=>'Cuentas','pagina'=>'cuentas', 'imagen'=>'small_cuenta.jpg', 'leyenda'=>'']);
        DB::table('modulos')->insert(['name'=>'Empleados','pagina'=>'empleados', 'imagen'=>'small_empleado.jpg', 'leyenda'=>'']);
        DB::table('modulos')->insert(['name'=>'Proveedores','pagina'=>'proveedores', 'imagen'=>'small_proveedor.jpg', 'leyenda'=>'']);
        DB::table('modulos')->insert(['name'=>'Areas','pagina'=>'areas', 'imagen'=>'small_area.jpg', 'leyenda'=>'']);
        DB::table('modulos')->insert(['name'=>'Ventas','pagina'=>'ventas', 'imagen'=>'small_venta.jpg', 'leyenda'=>'']);
        DB::table('modulos')->insert(['name'=>'Compras','pagina'=>'compras', 'imagen'=>'small_compra.jpg', 'leyenda'=>'']);

    }
}
