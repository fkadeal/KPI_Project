<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_sells', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('targete');
            $table->bigInteger('sells');
            $table->unsignedBigInteger('Kpi_id');
            $table->date('datepic');
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
        Schema::dropIfExists('product_sells');
    }
}
