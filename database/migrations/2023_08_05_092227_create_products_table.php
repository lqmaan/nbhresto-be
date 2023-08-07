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
        Schema::create('Products', function (Blueprint $table) {
            $table->string('product_id')->unique();
            $table->primary('product_id');
            $table->string('product_name');
            $table->string('product_category');
            $table->string('product_image');
            $table->integer('product_stock') -> default(0)->unsigned();
            $table->float('product_price')->unsigned();
            $table->string('product_opt')->default('{}');
            // $table->timestampTz()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps('create_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->foreign('product_category')->references('category_id')->on('Category')->onDelete('cascade');
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
