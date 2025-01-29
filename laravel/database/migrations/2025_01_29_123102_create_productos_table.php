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
            $table->integer('precio');
            $table->string('imagen');
            $table->unsignedBigInteger('categoria'); // unsignedBigInteger
            $table->index('categoria');
            $table->timestamps();
            
            $table->foreign('categoria')
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
