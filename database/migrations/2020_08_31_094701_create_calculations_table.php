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
            $table->integer('id_user');
            $table->integer('order_amount');
            $table->decimal('shipping_cost', 2, 1);
            $table->decimal('postcode', 5, 0);
            $table->boolean('long_product');
            $table->decimal('zone', 2, 0);
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
