<?php

use Illuminate\Support\Facades\Schema;
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
        Schema::create('product', function (Blueprint $table) {

            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('category');

            $table->increments('id');
            $table->string('name', 100);
            $table->string('slug', 100);
            $table->string('brand', 100);
            $table->string('description', 250)->nullable();
            $table->decimal('price');
            $table->decimal('associated_percentage');
            $table->decimal('street_percentage');
            $table->integer('product_limit')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('product');

    }
}
