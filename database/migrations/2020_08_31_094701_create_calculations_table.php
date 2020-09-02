<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalculationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calculations',
            function (Blueprint $table) {
            $table->id();
            $table->integer('order_amount');
            $table->decimal('order_value', 10, 2);
            $table->decimal('discount', 2, 2);
            $table->decimal('postcode', 5, 0);
            $table->boolean('long_product')->nullable();
            $table->string('zone_value', 2);
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
        Schema::dropIfExists('calculations');
    }
}
