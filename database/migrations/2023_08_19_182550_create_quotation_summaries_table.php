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
        Schema::create('quotation_summaries', function (Blueprint $table) {
            $table->id();
            $table->text('reference_no')->nullable();
            $table->float('down_payment', 16);
            $table->float('before_delivery', 16);
            $table->float('on_completion', 16);
            $table->integer('total_qty',);
            $table->float('net_total', 16);
            $table->float('shipping', 16)->nullable();
            $table->float('vat', 16);
            $table->float('vat_amount', 16);
            $table->float('gross_total', 16);
            $table->float('discount', 16)->nullable();
            $table->float('grand_total', 16);
            $table->text('prepared_by')->nullable();
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
        Schema::dropIfExists('quotation_summaries');
    }
};
