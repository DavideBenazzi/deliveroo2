<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // FK
            $table->string('name', 50);
            $table->text('description');
            $table->text('photo');
            $table->text('allergenic');
            $table->text('ingredients');
            $table->boolean('visibility');
            $table->float('price',6,2);
            // $table->string('slug', 100);
            $table->timestamps();

            //RELAZIONI
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
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
        Schema::dropIfExists('plates');
    }
}
