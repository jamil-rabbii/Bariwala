<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisementpropartiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisementproparties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title',100);
            $table->string('propartytype',100);
            $table->string('rentfor',100);
            $table->string('rentalperiod',100);
            $table->integer('price');
            $table->integer('room');
            $table->string('featureimg',200)->nullable();
            $table->string('num_plate',200)->nullable();
            $table->string('other_img',200)->nullable();
            $table->longText('description');
            $table->string('location',200);
            $table->string('city',100);
            $table->integer('bedroom')->nullable();
            $table->integer('bathroom')->nullable();
            $table->string('parking',100)->nullable();
            $table->text('otherfeatures')->nullable();
            $table->unsignedBigInteger('addid')->nullable();
            $table->foreign('addid')->references('id')->on('users');
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
        Schema::dropIfExists('advertisementproparties');
    }
}
