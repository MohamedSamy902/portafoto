<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->nullable();

            // $table->integer('quantity');

            $table->text('address_1');
            $table->text('address_2')->nullable();

            $table->string('mobile_1');
            $table->string('mobile_2')->nullable();
            $table->integer('zip_code')->nullable();


            $table->enum('payment', ['vodafoneCash', 'cashInDelivery', 'instapay'])->default('cashInDelivery');
            $table->float('totalPrice')->nullable();

            $table->unsignedInteger('governorate_id')->nullable();
            $table->foreign('governorate_id')->references('id')->on('governorates')->onDelete('cascade');

            $table->unsignedInteger('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->string('customerId');
            $table->enum('status', ['pending', 'refusal', 'approved', 'Cancel OrderBy Customer'])->default('pending');


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
        Schema::dropIfExists('invoices');
    }
};
