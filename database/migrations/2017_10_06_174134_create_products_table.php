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
        Schema::create('products', function (Blueprint $table) {

            $table->integer('categories_id')->unsigned();
            $table->foreign('categories_id')->references('id')->on('categories');
            $table->integer('units_id')->unsigned();
            $table->foreign('units_id')->references('id')->on('units');
            $table->increments('id');
            $table->string('name', 100);
            $table->string('slug', 100);
            $table->string('brand', 100);
            $table->string('description', 250);
            $table->decimal('price');
            $table->decimal('associated_percentage');
            $table->decimal('street_percentage');
            $table->integer('product_limit');
            $table->integer('quantity_available');
            $table->integer('quantity');
            $table->string('image');
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
        Schema::dropIfExists('products');

    }
}
