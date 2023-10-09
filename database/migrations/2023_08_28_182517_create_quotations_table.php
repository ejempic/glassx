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
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quotation_summary_id');
            $table->unsignedBigInteger('product_type_id');
            $table->unsignedBigInteger('frame_id');
            $table->unsignedBigInteger('glass_id');
            $table->unsignedBigInteger('handle_id');
            $table->unsignedBigInteger('upgrade_id');
            $table->unsignedBigInteger('glass_upgrade_id');
            $table->double('height',8,3);
            $table->double('width',8,3);
            $table->integer('qty')->default(1);
            $table->text('notes')->nullable();
            $table->text('file_path');
            $table->float('amount',16);
            $table->timestamps();

            $table->foreign('product_type_id')->references('id')->on('product_types');
            $table->foreign('frame_id')->references('id')->on('frames');
            $table->foreign('glass_id')->references('id')->on('glasses');
            $table->foreign('handle_id')->references('id')->on('handles');
            $table->foreign('upgrade_id')->references('id')->on('upgrades');
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
        Schema::dropIfExists('quotations');
    }
};
