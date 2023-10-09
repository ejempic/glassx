<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Upgrade;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upgrades', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->float('add_on')->nullable();
            $table->enum('unit',[Upgrade::PIECE,Upgrade::SQM])->nullable();
            $table->timestamps();
        });

        Schema::create('product_type_upgrades', function (Blueprint $table) {
            $table->unsignedBigInteger('product_type_id')->nullable();
            $table->unsignedBigInteger('upgrade_id')->nullable();

            $table->foreign('product_type_id')->references('id')->on('product_types');
            $table->foreign('upgrade_id')->references('id')->on('upgrades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('upgrades');
    }
};
