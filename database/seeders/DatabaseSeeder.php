<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Autor;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(40)->create();
        \App\Models\Categoria::factory(40)->create();
        \App\Models\Producto::factory(40)->create();
        \App\Models\Autor::factory(40)->create();
        

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            //UserSeeder::class,
            CategoriaSeeder::class,
            ProductoSeeder::class,
            AutorSeeder::class,
            
            
        ]);
        // $this->call([
        //     MuebleSeeder::class,
        //     ProductoSeeder::class
        // ]);

        
    }
}
