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
            $table->bigIncrements('id');
            $table->string('article_no');
            $table->string('item');
            $table->integer('quantity');
            $table->string('shipment_date');
            $table->string('revise_date');
            $table->string('production_unit')->nullable();
            $table->string('fabric_ref')->nullable();
            $table->integer('dye_factory')->nullable();
            $table->string('pp_status')->nullable();
            $table->string('fab_status')->nullable();
            $table->string('acc_status')->nullable();
            $table->string('prod_status')->nullable();
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
