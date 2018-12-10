<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViolationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('violations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('room_id')->nullable();
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->unsignedInteger('resident_id')->nullable();
            $table->foreign('resident_id')->references('id')->on('residents')->onDelete('cascade');
            $table->date('dateReported')->nullable();
            $table->string('name')->nullable();
            $table->date('dateCommitted')->nullable();
            $table->string('reportedBy')->nullable();
            $table->string('desc');
            $table->string('details')->nullable();
            $table->integer('fine')->nullable();
            $table->string('actionTaken')->nullable();
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
        Schema::dropIfExists('violations');
        $table->dropForeign('room_id');
        $table->dropForeign('resident_id');
    }
}
