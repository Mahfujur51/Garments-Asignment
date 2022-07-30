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
            $table->integer('dye_factory')->default(0);
            $table->boolean('pp_status')->default(0);
            $table->boolean('fab_status')->default(0);
            $table->boolean('acc_status')->default(0);
            $table->boolean('prod_status')->default(0);
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
