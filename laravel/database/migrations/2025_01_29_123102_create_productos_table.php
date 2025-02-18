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
        Schema::create('productos', function (Blueprint $table) {
            $table->id(); // unsignedBigInteger
            $table->string('nombre', 150);
            $table->string('descripcion', 150);
            $table->decimal('precio', 10, 2); //10 nº enteros máximos, 2 decimales maximos
            $table->string('imagen');
            $table->unsignedBigInteger('categoria_id'); // unsignedBigInteger
            $table->index('categoria_id');
            $table->timestamps();
            
            $table->foreign('categoria_id')
                ->references('id_categorias')
                ->on('categorias')
                ->onDelete('restrict');
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
};
