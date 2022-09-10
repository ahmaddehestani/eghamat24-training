<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstallmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('installments', function (Blueprint $table) {
            $table->id('installment_id');
            $table->string('name');
            $table->unsignedBigInteger('user_ref_id');
            $table->unsignedBigInteger('service_ref_id')->nullable();
            $table->string('start_price')->nullable();
            $table->string('end_price')->nullable();
            $table->string('installment_count');
            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('installments');
    }
}
