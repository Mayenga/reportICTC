<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('admin');
            $table->string('email')->unique()->default('admin@ictc.go.tz');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->default('ICTC123');
            $table->rememberToken();
            $table->timestamps();
            $table->bigInteger('dpt_id')->unsigned()->nullable();
            $table->foreign('dpt_id')->references('id')->on('departments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
