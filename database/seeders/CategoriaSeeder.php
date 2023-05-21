<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            'nombre' => 'Plantas',
            'description' => 'Tipos de plantas',
        ]);

        $categoria = new Categoria();
        $categoria->nombre = 'Animales';
        $categoria->description = 'Mamiferos, aves, reptiles';
        $categoria->save();
    }
}
