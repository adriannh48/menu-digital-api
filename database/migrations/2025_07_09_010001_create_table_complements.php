<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableComplements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complements', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->float('price')->nullable();
            $table->integer('mandatory')->nullable();
            $table->integer('max_quantity')->nullable();
            $table->integer('min_quantity')->nullable();
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
        Schema::dropIfExists('complements');
    }
}
