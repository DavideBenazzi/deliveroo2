<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderPlateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_plate', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('plate_id'); //FK user
            $table->unsignedBigInteger('order_id'); //FK type
            $table->timestamps();

             //Relazione 
             $table->foreign('plate_id')
             ->references('id')
             ->on('plates')
             ->onDelete('cascade');
         
             $table->foreign('order_id')
             ->references('id')
             ->on('orders')
             ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_plate');
    }
}
