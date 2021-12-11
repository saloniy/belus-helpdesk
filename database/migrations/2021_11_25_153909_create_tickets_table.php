<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('summary',80);
            $table->string('description',150);
            $table->dateTime('raised_on')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('status',15);
            $table->string('priority',15);
            $table->string('raised_by', 25);
            $table->string('assigned_to', 25);
            $table->foreign('raised_by')->references('email')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
