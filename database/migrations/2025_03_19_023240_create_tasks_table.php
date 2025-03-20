<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->text('author');
            $table->boolean('status')->default(false);
            $table->timestamps(); // esto se encarga de crear las columnas created_at y updated_at
        });

        // actualizar la tabla
        // Schema::table('tasks', function (Blueprint $table) {
        //     $table->string('author');
        // });


        // renombrar la tabla
        // Schema::rename('tasks', 'todos');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // si existe la tabla la elimina
       Schema::dropIfExists('tasks'); 
        // Schema::dropIfExists('todos');
    }
};
