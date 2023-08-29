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
        Schema::create('tarefs', function (Blueprint $table) {
            $table->id();
            $table->dateTime('data');
            $table->string('descricao');
            $table->text('descricao');
            $table->string('contato');
            $table->unsignedBigInteger('tipo_id');
            //$table->unsignedBigInteger('fk_id');
            $table->foreign('tipo_id')->references('id')->on('tipos');
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
        Schema::dropIfExists('tarefs');
    }
};
