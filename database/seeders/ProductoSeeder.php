<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Producto;


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
            'description' => 'Chica',
            'costo' => 45,
            'user_id' => 1,
        ]);

        $producto = new Producto();
        $producto->nombre = 'Pato';
        $producto->description = 'Mediano';
        $producto->costo = 50;
        $producto->user_id = 2;
        $producto->save();

        /** Producto::factory(50)->create(); */
    }
}
