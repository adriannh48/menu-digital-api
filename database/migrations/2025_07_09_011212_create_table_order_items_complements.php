<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOrderItemsComplements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_item_complements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_item_id')->constrained('order_items');
            $table->foreignId('complement_id')->constrained('complements');
            $table->integer('quantity')->nullable();
            $table->float('total_price')->nullable();
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
        Schema::dropIfExists('order_item_complements');
    }
}
