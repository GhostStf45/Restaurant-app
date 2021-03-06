<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('category_id')->unsigned();
           // $table->bigInteger('drink_id')->nullable();
            $table->string('name');
            $table->string('description');
            $table->string('price');
            $table->bigInteger('quantity')->nullable();
            $table->string('cover_img')->nullable();
            $table->timestamps();
        });

        Schema::table('products', function (Blueprint $table) {
            //
           // $table->foreign('category_id')->references('id')->on('categories');
            //$table->foreign('drink_id')->references('id')->on('drinks');
            //$table->bigInteger('quantity')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
