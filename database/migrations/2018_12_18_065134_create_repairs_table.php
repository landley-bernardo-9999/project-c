<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repairs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('room_id')->nullable();
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->unsignedInteger('resident_id')->nullable();
            $table->foreign('resident_id')->references('id')->on('residents')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->date('dateReported')->nullable();
            $table->date('dateStarted')->nullable();
            $table->date('dateFinished')->nullable();
            $table->string('desc');
            $table->string('endorsedTo')->nullable();
            $table->integer('totalCost');
            $table->string('status');
            $table->string('rating')->nullable();
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
        Schema::dropIfExists('repairs');
        $table->dropForeign('room_id');
        $table->dropForeign('resident_id');
    }
}
