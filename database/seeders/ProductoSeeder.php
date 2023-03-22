<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productos')->insert([
            'nombre' => 'Planta',
            'descripcion' => 'Chica',
            'costo' => 45,
        ]);

        $producto = new Producto();
        $producto->nombre = 'Pato';
        $producto->description = 'Mediano';
        $producto->costo = 50;
        $producto->save();

        /** Producto::factory(50)->create(); */
    }
}
