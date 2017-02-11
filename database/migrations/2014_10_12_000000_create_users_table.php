<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('auto_pk');
            $table->uuid('id')->unique();
            $table->string('username', 50)->unique()->nullable();
            $table->string('nickname', 50)->index()->nullable();
            $table->string('email', 100)->unique()->nullable();
            $table->string('avatar')->nullable();
            $table->string('password')->nullable();
            $table->jsonb('extra')->nullable();
            $table->rememberToken();
            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}
