<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoucherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Voucher', function (Blueprint $table) {
            $table->string('voucher_id')->primary();
            $table->string('voucher_name');
            $table->date('voucher_exp');
            $table->string('voucher_status');
            $table->string('voucher_type');
            $table->float('voucher_amount')->unsigned();
            $table->float('min_order')->unsigned();
            $table->float('max_amount')->unsigned();
            // $table->timestampTz()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps('create_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voucher');
    }
}
