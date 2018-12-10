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
            $table->unsignedInteger('room_id')->nullable();
            $table->foreign('room_id')
                    ->references('id')->on('rooms')
                    ->onDelete('cascade');
            $table->unsignedInteger('resident_id')->nullable();
            $table->foreign('resident_id')
                    ->references('id')->on('residents')
                    ->onDelete('cascade');
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
        $table->dropForeign(['resident_id']);
        $table->dropForeign(['room_id']);
    }
}
