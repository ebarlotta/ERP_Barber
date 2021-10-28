<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        $this->call(IvaSeeder::class);
        
        \App\Models\Empresa::factory(4)->create();
        $this->call(TablaSeeder::class);

        \App\Models\Area::factory(10)->create();
        \App\Models\Cuenta::factory(10)->create();
        \App\Models\Proveedor::factory(10)->create();
        \App\Models\Cliente::factory(10)->create();
        \App\Models\Categoriaprofesional::factory(10)->create();
        \App\Models\Concepto::factory(10)->create();
        \App\Models\EmpresaUsuario::factory(10)->create();
        $this->call(ModuloSeeder::class);
        \App\Models\Empleado::factory(10)->create();
        \App\Models\EmpresaModulo::factory(10)->create();
        \App\Models\ModuloUsuario::factory(10)->create();
        
        //\App\Models\Modulo::factory(10)->create();
        //\App\Models\Tabla::factory(10)->create();

        $this->call(ComprobanteSeeder::class);
        
    }
}
