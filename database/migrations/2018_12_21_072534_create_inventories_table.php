<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->increments('id');
            $table->date('inventory_date');
            $table->unsignedInteger('inventory_roomId')->nullable();
            $table->foreign('inventory_roomId')->references('id')->on('rooms')->onDelete('cascade');
            $table->unsignedInteger('inventory_residentId')->nullable();
            $table->foreign('inventory_residentId')->references('id')->on('residents')->onDelete('cascade');
            $table->string('furn')->nullable();
            $table->string('category')->nullable();
            $table->string('moveInInventory')->nullable();
            $table->string('moveInRemarks')->nullable();
            $table->string('moveOutInventory')->nullable();
            $table->string('moveOutRemarks')->nullable();

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
        Schema::dropIfExists('inventories');
        $table->dropForeign('inventory_roomId');
        $table->dropForeign('inventory_residentId');
    }
}
