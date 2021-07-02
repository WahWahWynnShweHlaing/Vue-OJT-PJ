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
            $table->increments('id')->unsigned(false);
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('profile');
            $table->string('type',1);
            $table->string('phone',20)->nullable();
            $table->string('address',225)->nullable();
            $table->date('DOB');
            $table->integer('create_user_id');
            $table->foreign('create_user_id')->references('ID')->on('users')->onDelete('cascade');
            $table->integer('updated_user_id');
            $table->foreign('updated_user_id')->references('ID')->on('users')->onDelete('cascade');
            $table->integer('deleted_user_id')->nullable();
            $table->datetime('created_at')->useCurrent();
            $table->datetime('updated_at')->useCurrent();
            $table->datetime('deleted_at')->nullable();
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
