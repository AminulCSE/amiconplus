<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_date');
            $table->string('customer_id');
            $table->string('order_description');
            $table->string('quantity');
            $table->string('unit_price');
            $table->string('discount')->nullable();
            $table->string('paid')->nullable();
            $table->string('dalivary_date')->nullable();
            $table->string('order_month');
            $table->string('order_year');
            $table->string('order_status')->default(0);
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
        Schema::dropIfExists('orders');
    }
}
