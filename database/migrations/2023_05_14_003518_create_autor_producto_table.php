<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autor_producto', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->foreignId('autor_id')->constrained()->OnDelete('cascade'); // Borras al autor, borra la referencia en esa tabla
            $table->foreignId('producto_id')->constrained()->OnDelete('cascade');
            $table->timestamp('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('autor_producto');
    }
};
