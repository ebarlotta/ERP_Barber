<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name(),
            'descripcion'=>$this->faker->word(),
            'precio_compra'=>100.28,
            'existencia'=>0,

            'unidads_id'=>$this->faker->ramdomElement('App\Models\Unidad'),
            'categoriaproductos_id'=>$this->faker->ramdomElement('App\Models\Categoriaproducto'),
            'estados_id'=>$this->faker->ramdomElement('App\Models\Estado'),
            'proveedor_id'=>$this->faker->ramdomElement('App\Models\Producto'),
        ];
    }
}
