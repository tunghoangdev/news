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
            $table->increments('pro_id');
            $table->string('pro_name')->unique();
            $table->string('pro_alias')->unique();
            $table->integer('pro_price');
            $table->text('pro_intro');
            $table->longText('pro_content');
            $table->string('pro_images');
            $table->string('pro_keywords');
            $table->string('pro_descriptions');
            $table->integer('pro_userid')->unsigned();
            $table->foreign('pro_userid')->references('id')->on('users')->onDelete('cascade');
            $table->integer('pro_catid')->unsigned();
            $table->foreign('pro_catid')->references('cat_id')->on('categories')->onDelete('cascade');
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
