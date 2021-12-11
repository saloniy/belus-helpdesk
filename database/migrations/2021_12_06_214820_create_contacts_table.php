<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('name',20);
            $table->string('email',50);
            $table->string('subject',60);
            $table->string('message',150);
        });
    }

    /**
     * Reverse the migrations.

     * @return void
     */



    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
