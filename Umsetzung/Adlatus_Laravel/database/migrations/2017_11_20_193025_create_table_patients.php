<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePatients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function(Blueprint $table) {
            $table->bigInteger('sozNr')->primary();
            $table->string('vorname');
            $table->string('nachname');
            $table->string('email')->nullable();
            $table->string('password');
            $table->char('therapeut_sozNr', 20);
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('therapeut_sozNr')->references('sozNr')->on('therapeuts');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
