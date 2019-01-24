<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('category');
            $table->string('img', 350);
            $table->string('title', 60);
            $table->string('description', 300);
            $table->string('location', 45)->nullable();
            $table->string('region', 45);
            $table->float('price_per_hour')->default(0.01);
            $table->integer('max_number_of_people');
            $table->integer('min_number_of_people');
            $table->integer('min_duration');
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
        Schema::dropIfExists('activity');
    }
}
