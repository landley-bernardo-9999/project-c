<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->date('transDate');
            $table->unsignedInteger('roomNo_id')->nullable();
            $table->unsignedInteger('resident_id')->nullable();
            $table->string('transStatus');
            $table->date('moveInDate');
            $table->date('moveOutDate');
            $table->string('term');
            $table->integer('initialSecDep');
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
        Schema::dropIfExists('transactions');
    }
}
