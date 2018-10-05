<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('orderid');
            $table->integer('userID');
            $table->text('cart');
            $table->string('fname');
            $table->string('lname');
            $table->text('street');
            $table->integer('barangay');
            $table->string('city');
            $table->integer('zip');
            $table->string('status');
            $table->integer('contactno');
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
