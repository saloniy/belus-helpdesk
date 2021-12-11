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
            $table->string('email',25)->primary();
            $table->integer('id');
            $table->string('name', 50);
            $table->string('password', 15);
            $table->string('contact', 15);
            $table->string('address', 100);
            $table->boolean('isAdmin');
            $table->boolean('isCustomer');
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
