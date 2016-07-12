<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('alias')->unique();
            $table->integer('price');
            $table->text('intro');
            $table->longText('content');
            $table->string('images');
            $table->string('keywords');
            $table->string('descriptions');
            $table->integer('userid')->unsigned();
            $table->foreign('userid')->references('id')->on('users')->onDelete('cascade');
            $table->integer('catid')->unsigned();
            $table->foreign('catid')->references('id')->on('categories')->onDelete('cascade');
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
        Schema::drop('products');
    }
}
