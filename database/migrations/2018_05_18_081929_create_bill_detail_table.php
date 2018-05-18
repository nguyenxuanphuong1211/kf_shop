<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Bill_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantity');
            $table->float('unit_price',30);

            $table->integer('bill_id')->unsigned()->nullable();
            $table->foreign('bill_id')->references('id')->on('Bills');

            $table->integer('product_id')->unsigned()->nullable();
            $table->foreign('product_id')->references('id')->on('Products');

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
        Schema::dropIfExists('Bill_detail');
    }
}
