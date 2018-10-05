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
<<<<<<< HEAD
            $table->increments('id');
=======
            $table->increments('orderid');
>>>>>>> 8cf2bed61f241bd5d927d7e419ae00e230ff033e
            $table->integer('userID');
            $table->text('cart');
            $table->string('fname');
            $table->string('lname');
<<<<<<< HEAD
            $table->string('username');
            $table->string('email');
=======
>>>>>>> 8cf2bed61f241bd5d927d7e419ae00e230ff033e
            $table->text('street');
            $table->integer('barangay');
            $table->string('city');
            $table->integer('zip');
<<<<<<< HEAD
=======
            $table->string('status');
            $table->integer('contactno');
>>>>>>> 8cf2bed61f241bd5d927d7e419ae00e230ff033e
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
