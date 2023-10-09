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
        Schema::create('glass_upgrades', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->float('multiplier')->nullable();
            $table->timestamps();
        });

        Schema::create('product_type_glass_upgrades', function (Blueprint $table) {
            $table->unsignedBigInteger('product_type_id')->nullable();
            $table->unsignedBigInteger('glass_upgrade_id')->nullable();

            $table->foreign('product_type_id')->references('id')->on('product_types');
            $table->foreign('glass_upgrade_id')->references('id')->on('glass_upgrades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('glass_upgrades');
    }
};
