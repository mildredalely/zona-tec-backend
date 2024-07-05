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
        Schema::create('clientes', function (Blueprint $table) {
           // $table->id();
            $table->bigIncrements('id');
            $table->string('folio')->default(' '); 
            $table->string('nombre', 100);
            $table->integer('telefono', 15);
            $table->string('tipo_dispositivo', 50);
            $table->string('otro_dispositivo', 100)->nullable();
            $table->string('modelo',10);
            $table->text('observaciones')->nullable();
            $table->text('diagnostico')->nullable();
            $table->text('especificaciones')->nullable();
            $table->string('status', 255)->default('pendiente'); // Añadir el campo status con un valor por defecto
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
        //
    }
};