<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function(Blueprint $table) {
            $table->increments('task_id');
            $table->integer('fk_userid');
            $table->integer('fk_activityid');
            $table->date('datum');
            $table->dateTime('uhrzeit');
            $table->char('wochentag', 20);
            $table->char('titel', 40);
            $table->boolean('confirmed');
            $table->char('nachricht', 200)->nullable();
            $table->timestamps();
            $table->foreign('fk_userid')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('fk_activityid')->references('pk_activityid')->on('activity')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('tasks');
    }
}
