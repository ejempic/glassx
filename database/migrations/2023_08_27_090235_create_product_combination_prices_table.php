<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_combination_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_type_id');
            $table->unsignedBigInteger('frame_id');
            $table->unsignedBigInteger('glass_id');
            $table->unsignedBigInteger('handle_id');
            $table->float('base_price');
            $table->timestamps();

            $table->foreign('product_type_id')->references('id')->on('product_types');
            $table->foreign('frame_id')->references('id')->on('frames');
            $table->foreign('glass_id')->references('id')->on('glasses');
            $table->foreign('handle_id')->references('id')->on('handles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_combination_prices');
    }
};
