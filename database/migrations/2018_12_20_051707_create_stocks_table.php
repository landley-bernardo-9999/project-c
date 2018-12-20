<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->date('stock_date')->nullable();
            $table->string('stock_category')->nullable();
            $table->string('stock_brand')->nullable();
            $table->string('stock_desc')->nullable();
            $table->string('stock_serialNumber')->nullable();
            $table->integer('stock_qty')->nullable();
            $table->string('stock_action')->nullable();
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
        Schema::dropIfExists('stocks');
    }
}
