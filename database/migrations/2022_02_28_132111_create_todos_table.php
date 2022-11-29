<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('process');
            $table->date('deadline');
            $table->string('progress');
            $table->string('output');
            $table->boolean('complited')->default(false);
            $table->timestamp('completedtime')->default(now());
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps(); 
            $table->boolean('transfered')->default(false);
            $table->Integer('transferedWho');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('reason');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todos');
    }
}