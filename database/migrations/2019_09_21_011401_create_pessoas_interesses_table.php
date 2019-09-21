<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoasInteressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas_interesses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('pessoa_id')->unsigned();
            $table->integer('interesse_id')->unsigned();
            $table->timestamps();

            $table->foreign('pessoa_id')
                ->references('id')
                ->on('pessoas');

            $table->foreign('interesse_id')
                ->references('id')
                ->on('interesses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoas_interesses');
    }
}
