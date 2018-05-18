<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->longText('description_detail');
            $table->longText('description_brief');
            $table->enum('hot',['1','0']);
            $table->enum('new',['1','0']);
            $table->enum('deals',['1','0']);
            $table->integer('quantity');
            $table->float('unit_price',30);
            $table->float('promotion_price',30);
            $table->string('unit');

            $table->integer('brand_id')->unsigned()->nullable();
            $table->foreign('brand_id')->references('id')->on('Brands');

            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('Categories');
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
        Schema::dropIfExists('Products');
    }
}
